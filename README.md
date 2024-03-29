# packetdrill testcases

The [packetdrill](https://opensource.google/projects/packetdrill) scripting
tool enables quick, precise tests for entire TCP/UDP/IPv4/IPv6 network stacks,
from the system call layer down to the NIC hardware. This repository contains
about 1.5k testcases for packetdrill.

## Specifications:

* **TCP** ~RFC 675~, [RFC 761](https://tools.ietf.org/html/rfc761), [RFC 793](https://tools.ietf.org/html/rfc793), [RFC 1180](https://tools.ietf.org/html/rfc1180), [RFC 4413](https://tools.ietf.org/html/rfc4413)
* **UDP** [RFC 768](https://tools.ietf.org/html/rfc768)
* **UDPLite** [RFC 3828](https://tools.ietf.org/html/rfc3828)
* **SCTP** [RFC 4960](https://tools.ietf.org/html/rfc4960), [RFC 4820](https://tools.ietf.org/html/rfc4820), [RFC 6458](https://tools.ietf.org/html/rfc6458), [RFC 7053](https://tools.ietf.org/html/rfc7053), [RFC 3286](https://tools.ietf.org/html/rfc3286), [RFC 4960](https://tools.ietf.org/html/rfc4960)
* **IPv4** ~RFC 760~, RFC 790, RFC 791
* **IPv6** [RFC 2460](https://tools.ietf.org/html/rfc2460), [RFC 4291](https://tools.ietf.org/html/rfc4291), ~RFC 1883~, ~RFC 2460~, RFC 8200

## How-To

```
sudo scripts/install-packetdrill.sh
python3 -m venv venv
source venv/bin/activate
pip install -r scripts/requirements.txt
python3 scripts/run-tests.py --discovery
python3 scripts/run-tests.py --report_file junit.xml
python3 scripts/run-tests.py --testplan testplans/testplan-freebsd.json
python3 scripts/run-tests.py --testplan testplans/testplan-linux.json --report_file junit.xml
```

## TODO

- [libuinet](https://github.com/pkelsey/libuinet)
- [F-stack](https://github.com/F-Stack/f-stack)
- [LWIP](https://savannah.nongnu.org/projects/lwip/)
- [mTCP](https://github.com/mtcp-stack/mtcp)
- [uIP](https://github.com/adamdunkels/uip)
- [Luna Stack](https://www.dpdk.org/wp-content/uploads/sites/35/2019/07/04-DPDK-based-userspace-TCPIP-stack-testing.pdf)
- [smoltcp](https://github.com/smoltcp-rs/smoltcp)

## How to contribute

TODO

## Acknowledments

- Google, Inc.: https://github.com/google/packetdrill/gtests/net/packetdrill/tests
- FreeBSD Community:
  - https://github.com/freebsd-net/TCP-IP-Regression-TestSuite
  - https://github.com/shivansh/TCP-IP-Regression-TestSuite
  - https://wiki.freebsd.org/SummerOfCode2016/TCP-IP-RegressionTestSuite
- Michael Tüxen and Netflix, Inc.
  - https://github.com/freebsd-net/tcp-testsuite
- NPLab (Network Programming Laboratory of Münster University of Applied Sciences):
  - https://github.com/nplab/packetdrill
  - https://github.com/nplab/packetdrill/tree/master/gtests/net/packetdrill/tests
  - https://github.com/nplab/misc-tcp-testscripts
  - https://github.com/nplab/PR_SCTP_Testsuite
