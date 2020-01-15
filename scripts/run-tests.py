#!/usr/bin/env python

import argparse
import subprocess
import os
import re
import time
import sys
import socket
import logging
from datetime import datetime
from junit_xml import TestSuite, TestCase
import json

DEFAULT_TEST_TIMEOUT = 20
DEFAULT_TEST_DIR = "testcases"
DEFAULT_REPORT_NAME = "report.xml"
DEFAULT_COMMAND_LINE = "/usr/local/bin/packetdrill --verbose {}"

SUPPORTED_FILE_EXTENSIONS = [".pkt"]

logging.basicConfig(level=logging.INFO,
                    format='%(asctime)s [%(levelname)s] %(message)s')


def run_testcase(test_path, test_timeout=DEFAULT_TEST_TIMEOUT):
    packetdrill_cmd = DEFAULT_COMMAND_LINE.format(test_path)
    logging.debug("Command: {}".format(packetdrill_cmd))
    start = time.time()
    try:
        rc = subprocess.run(packetdrill_cmd,
                            timeout=test_timeout,
                            shell=True,
                            capture_output=True,
                            universal_newlines=True)
        execution_time = time.time() - start
    except subprocess.TimeoutExpired:
        logging.info("Timeout is exceed ({})".format(test_timeout))

    if rc.stderr:
        logging.info(rc.stderr)

    return rc.returncode, rc.stdout, rc.stderr, execution_time


def search_testcases(root_path):
    tests = []
    for root, dirs, files in os.walk(root_path):
        path = root.split(os.sep)
        for f in files:
            extension = os.path.splitext(f)[1]
            if extension in SUPPORTED_FILE_EXTENSIONS:
                test = {"name": os.path.join(root, f)}
                tests.append(test)

    return tests


def main():
    parser = argparse.ArgumentParser()
    parser.add_argument("--test_dir", help="directory with testcases",
                        default=DEFAULT_TEST_DIR)
    parser.add_argument("--test_timeout", help="test execution timeout",
                        default=DEFAULT_TEST_TIMEOUT)
    parser.add_argument("--discovery", action='store_true',
                        help="discovery testcases")
    parser.add_argument("--testplan", help="path to a testing plan")
    parser.add_argument("--report_file", help="path to report file",
                        default=DEFAULT_REPORT_NAME)
    args = parser.parse_args()

    if not os.path.isdir(args.test_dir):
        logging.warning("Path %s is not a directory" % args.test_dir)
        sys.exit(1)

    testcases = []
    if args.testplan:
        with open(args.testplan, 'r') as plan:
            testcases = json.loads(plan.read())
    else:
        testcases = search_testcases(args.test_dir)
        if args.discovery:
            for test in testcases:
                logging.info("Found testcase: {}".format(test))
            sys.exit(0)

    tests = []
    overall_rc = 0
    for testcase in testcases:
        test_path = testcase["path"]
        if testcase.get("skip_reason"):
            test = TestCase(test_path)
            test.add_skipped_info(testcase["skip_reason"])
            status_str = "SKIPPED"
        else:
            rc, stdout, stderr, duration = run_testcase(test_path)
            test = TestCase(test_path, '', duration, stdout, stderr)
            status_str = "PASSED"
            if rc != 0:
                overall_rc += 1
                test.add_failure_info(message=stderr, output=stderr)
                status_str = "FAILED"
        logging.info("{} ({})".format(status_str, test_path))
        tests.append(test)

    try:
        hostname = socket.gethostbyaddr(socket.gethostname())[0]
    except socket.gaierror:
        hostname = ""

    suite = TestSuite(
        name="suite",
        test_cases=tests,
        hostname=hostname
    )

    with open(args.report_file, 'w') as output:
        output.write(TestSuite.to_xml_string([suite]))
        logging.info("Test output is written to %s", args.report_file)

    logging.info("Failed {} tests out of {}.".format(overall_rc, len(testcases)))
    sys.exit(overall_rc)


if __name__ == "__main__":
    main()
