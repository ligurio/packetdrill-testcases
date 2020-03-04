<?php
require_once "./vendor/autoload.php";

//\TheAomx\Nodes\Indentation::$indentationCharacter = " ";
//\TheAomx\Nodes\Indentation::$indentationDepth = 2;
//\TheAomx\Nodes\Indentation::$lineBreaker = "\n";

use \TheAomx\Nodes\HtmlNode as HtmlNode;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Abbreviation {
    public $abbreviation;
    public $long_description;
    
    public function __construct($abbrev, $desc) {
        $this->abbreviation = $abbrev;
        $this->long_description = $desc;
    }
}

$abbreviations = array(
    new Abbreviation("SCTP", "Stream Control Transmission Protocol"),
    new Abbreviation("PR-SCTP", "Partial Reliability Extension for SCTP"),
    new Abbreviation("NR-SACK", "Non-Renegable Selective Acknowledgements"),
    new Abbreviation("RFC", "Request for comments"),
    new Abbreviation("IUT", "Implementation under Test"),
    new Abbreviation("TSN", "Transmission Sequence Number"),
    new Abbreviation("cwnd", "Congestion Window Size"),
    new Abbreviation("cum_tsn", "Cumulative Transmission Sequence Number"),
    new Abbreviation("gaps", "Gap Ackowledgement Blocks"),
    new Abbreviation("nr-gaps", "Non Renegable Gap Ackowledgement Blocks"),
);

uasort($abbreviations, function ($a, $b) {
    return strcmp($a->abbreviation, $b->abbreviation);
});

class ExternalReference {
    public $name, $id, $link;
    
    function __construct($name, $id, $link) {
        $this->name = $name;
        $this->id = $id;
        $this->link = $link;
    }
}

$external_references = array(
    new ExternalReference("RFC 4960 (SCTP)", "rfc4960", "https://tools.ietf.org/html/rfc4960"),
    new ExternalReference("RFC 3758 (PR-SCTP)", "rfc3758", "https://www.ietf.org/rfc/rfc3758.txt"),
    new ExternalReference("RFC 6458 (Sockets API Extensions for SCTP)", "rfc6458", "https://www.ietf.org/rfc/rfc6458.txt"),
    new ExternalReference("RFC 7496 (Additional Policies for SCTP)", "rfc7496", "https://www.ietf.org/rfc/rfc7496.txt"),
    new ExternalReference("Internet Draft - Stream Schedulers and User Message Interleaving for SCTP", "ndata05", "https://tools.ietf.org/html/draft-ietf-tsvwg-sctp-ndata-05"),
    new ExternalReference("Internet Draft - Load Sharing for SCTP", "loadsharing", "https://tools.ietf.org/html/draft-tuexen-tsvwg-sctp-multipath-05"),
);


class Testsuite {
    public $id, $folderName, $longName, $notice;
	public $test_cases = array();
    
    function __construct($id, $folderName, $longName, $notice = "") {
        $this->id = $id;
        $this->folderName = $folderName;
        $this->longName = $longName;
        $this->notice = $notice;
    }

    public function __toString() {
        $html = "";
        $html .= HtmlNode::get_builder("h2")->text($this->longName)->build();

        if (!empty($this->notice)) {
            $html .= HtmlNode::get_builder("p")->text("<strong>Notice:</strong> " . $this->notice)->build();
        }

        foreach ($this->test_cases as $test_case) {
            $html .= $test_case;
            $a = HtmlNode::get_builder("a")->attribute("href", "#overview")->
                    s_text("Back to Testsuite-Overview")->build();
            $html .= $a;
        }

        return $html;
    }

}

class Testcase {
    public $id = "", $precondition = "", $purpose = "", $references = "";
    
    private function build_tr_row ($name, $value) {
        $tr = HtmlNode::get_builder("tr")->build();
        $tr->append(HtmlNode::get_builder("td")->text($name)->build())->
             append(HtmlNode::get_builder("td")->text($value)->build());
        return $tr;
    }
    
    public function __toString() {
        $table = HtmlNode::get_builder("table")->attribute("class", "table table-bordered test_case_table")->
                 attribute("id", $this->id)->build();
        $tbody = HtmlNode::get_builder("tbody")->build();
        $table->append($tbody);
        
        $tr_id = $this->build_tr_row("ID", $this->id);
        $tr_precondition = $this->build_tr_row("Precondition", $this->precondition);
        $tr_purpose = $this->build_tr_row("Purpose", $this->purpose);
        $tr_references = $this->build_tr_row("References", $this->references);

        $tbody->append($tr_id)->
                append($tr_precondition)->
                append($tr_purpose)->
                append($tr_references);

        return strval($table);
    }
}

class TestcaseParserStates {
    public static $INIT_STATE=1, $PRECONDITION_STATE=2, $PURPOSE_STATE=3, $REFERENCES_STATE=4;
}

function parseLine($line, $state, $test_case) {
    switch ($state) {
        case TestcaseParserStates::$INIT_STATE:
            if (preg_match("/Precondition/i", $line)) {
                $state = TestcaseParserStates::$PRECONDITION_STATE;
            }
            break;

        case TestcaseParserStates::$PRECONDITION_STATE:
            if (preg_match("/Purpose/i", $line)) {
                $state = TestcaseParserStates::$PURPOSE_STATE;
            } else {
                $test_case->precondition .= $line;
            }
            break;

        case TestcaseParserStates::$PURPOSE_STATE:
            if (preg_match("/References/i", $line)) {
                $state = TestcaseParserStates::$REFERENCES_STATE;
            } else {
                $test_case->purpose .= $line;
            }
            break;
        case TestcaseParserStates::$REFERENCES_STATE:
            $test_case->references .= $line;
            break;
    }
    
    return $state;
}

function loadTestCase ($id, $filename) {
    $handle = fopen($filename, "r");
    
    if (!$handle) {
        throw new RuntimeException("test case $filename could not be opened!");
    }
    
    $test_case = new Testcase();
    $test_case->id = $id;
    
    $state = TestcaseParserStates::$INIT_STATE;
    
    while (($raw_line = fgets($handle)) != null) {
        $line = trim($raw_line);
        if ($line === "") {
            continue;
        }
        
        $state = parseLine($raw_line, $state, $test_case);
    }
    
    fclose($handle);
    
    return $test_case;
}

function loadTestCases($suite_folder_name) {
    $test_cases = scandir($suite_folder_name);
    $test_cases_filtered = array_filter($test_cases, function($element) use (&$suite_folder_name) {
        return !($element === "." || $element === ".." || is_dir($suite_folder_name. '/'. $element));
    });
    
    $ret = array();
    
    foreach ($test_cases_filtered as $test_case_id) {
        $filename = $suite_folder_name . "/" . $test_case_id;
        $test_case = loadTestCase($test_case_id, $filename);
        array_push($ret, $test_case);
    }
    
    return $ret;
}

$test_suites = array(
    new Testsuite("nftsp", "negotiation-forward-tsn-supported-parameter", "Negotiation of Forward-TSN-supported parameter"),
    new Testsuite("ssi", "sender-side-implementation", "Sender Side Implementation", 'These test cases use the term "abandoned" like defined in <a href="https://tools.ietf.org/html/rfc3758#section-3.4">RFC 3758 [section 3.4]</a>. 
                                    This means that these test cases have to be implemented for each specific policy rule that defines when a data chunk should be considered "abandoned" for the sender.'),
    new Testsuite("rsi", "receiver-side-implementation", "Receiver Side Implementation", 'Please note that the packet-loss test-cases can be applied to ordered, unordered or an mixture of both DATA-Chunks. To avoid redundant definitions of equivalent loss patterns these descriptions are so generic that they can be applied to both ordered and unordered or an mixture of both.'),
    new Testsuite("error-cases", "error-cases", "Error Cases"),
    new Testsuite("hwift", "handshake-with-i-forward-tsn", "Handshake with I-FORWARD-TSN"),
    new Testsuite("hwnrs", "handshake-with-nr-sack", "Handshake with NR-SACK"),
    new Testsuite("daswnrs", "data-sender", "Data Sender with NR-SACK"),
    new Testsuite("darwnrs", "data-receiver", "Data Receiver with NR-SACK"),
);

function sort_by_testcase_id($a, $b) {
    $regex = '!([^0-9.]*)(\d+)!';
    $matches_a = array();
    $matches_b = array();
    preg_match_all($regex, $a->id, $matches_a);
    preg_match_all($regex, $b->id, $matches_b);

    $test_case_name_a = $matches_a[1][0];
    $test_case_name_b = $matches_b[1][0];

    $test_case_id_a = $matches_a[2][0];
    $test_case_id_b = $matches_b[2][0];

    if ($test_case_name_a !== $test_case_name_b) {
        return $test_case_name_a > $test_case_name_b;
    } else {
        return $test_case_id_a > $test_case_id_b;
    }
}

$all_test_cases = array();

foreach ($test_suites as $test_suite) {
    $test_suite->test_cases = loadTestCases($test_suite->folderName);
}

uasort($test_suites[1]->test_cases, "sort_by_testcase_id");
uasort($test_suites[2]->test_cases, "sort_by_testcase_id");
uasort($test_suites[4]->test_cases, "sort_by_testcase_id");
uasort($test_suites[6]->test_cases, "sort_by_testcase_id");
uasort($test_suites[7]->test_cases, "sort_by_testcase_id");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test-Suite for the SCTP Partial Reliability Extension</title>
     <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/css/ie-bugfix.css" rel="stylesheet">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
            * {
                    padding: 0;
                    margin: 0;
            }
            body {
                    margin: 10px 100px 10px 20px;
            }
            h1 {
                    margin: 20px 0px;
            }
            h2 {
                    margin: 15px 10px;
            }
            h3 {
                    margin: 12px 15px;
            }
            ul {
                    padding: 1em 2em;
                    list-style-type: disc;
                    list-style-position: outside;
                    list-style-image: none;
            }

            .overview_ol {
                    list-style-type: upper-roman; 
                    padding: 1em 2em;
            }

            ol {
                    padding: 1em 2em;
            }

            #abbreviation_table {
                    border-collapse: collapse;
            }

            #abbreviation_table td {
                    border: 1px solid black;
                    padding: 10px;
            }

            .test_case_table {
                    /*width: 75%;*/
                    /*border-collapse: collapse;*/
                    margin: 20px 20px;
                    background-color: #fbfbfb;
            }

            .test_case_table td {
                    border: 1px solid black;
                    padding: 10px;
            }

            .todo {
                    color: red;
            }
            
            .footer {
                text-align: center;
            }

            a {
                    color: blue;
            }
    </style>
    </head>
    <body>
        <div class="container">
        <h1>Test-Suite for the SCTP Partial Reliability Extension</h1>
        
	<h2>Introduction</h2>
        <div class="well">
            <p>This is a document that defines a test suite for the partial reliability extension of sctp.
                The designed test suite for PR-SCTP consists of eight different categories. A practial implementation of
                these test-cases can be found for the tool packetdrill under <a href="https://github.com/nplab/PR_SCTP_Testsuite">https://github.com/nplab/PR_SCTP_Testsuite</a>.
                Most test-cases were specified close to the specification of the tested extensions of SCTP. Therefore each test-case
                lists the relevant references that were used to design the test-case. 
            </p>
                
            <p> 
                Please note that the categories <i>Sender Side Implementation</i> and <i>Receiver Side Implementation</i> can be applied to either the classic 
                PR-SCTP or the PR-SCTP extension with user message interleaving (see <a href="https://tools.ietf.org/html/draft-ietf-tsvwg-sctp-ndata-09">Stream Schedulers and User Message Interleaving for SCTP</a>).
                If these tests are applied to the user message interleaving extension then the sid/ssn-values in the DATA-Chunks have to converted
                such that they match the new sid/mid/fsn-values in the I-DATA-Chunk (and also use the I-DATA-Chunk instead). 
                Also each FORWARD-TSN-Chunk has to be replaced by an equivalent I-FORWARD-TSN-Chunk. Other than these conversions
                every test case of the categories <i>Sender Side Implementation</i> and <i>Receiver Side Implementation</i> can also
                be applied to the Stream Schedulers and User Message Interleaving extension.
            </p>
        </div>

	<h2 id="overview">Overview of Test-Suite-Structure</h2>
	<?php
        function createTestsuiteListingDivs($test_suites) {
            $divs = array();

            foreach ($test_suites as $test_suite) {
                $div = HtmlNode::get_builder("div")->attribute("class", "col-sm-4")->build();
                $panel_div = HtmlNode::get_builder("div")->attribute("class", "panel panel-default")->build();
                $div->addChildNode($panel_div);
                $heading_div = HtmlNode::get_builder("div")->attribute("class", "panel-heading")->build();
                $body_div = HtmlNode::get_builder("div")->attribute("class", "panel-body")->build();
                $panel_div->append($heading_div)->append($body_div);
                $h3 = HtmlNode::get_builder("h3")->attribute("class", "panel-title")->s_text($test_suite->longName)->build();
                $heading_div->append($h3);

                $ul = HtmlNode::get_builder("ul")->build();
                foreach ($test_suite->test_cases as $test_case) {
                    $li_child = HtmlNode::get_builder("li")->build();
                    $a_child = HtmlNode::get_builder("a")->attribute("href", "#" . $test_case->id)->s_text($test_case->id)->build();
                    $li_child->append($a_child);
                    $ul->append($li_child);
                }
                $body_div->append($ul);

                array_push($divs, $div);
            }
            
            return $divs;
        }
        
        function renderTestsuiteListing($divs) {
            $outer_div = $div = HtmlNode::get_builder("div")->attr("class", "col-sm-12")->build();
            $i = 1;
            foreach ($divs as $div) {
                $outer_div->append($div);

                if (($i % 3) === 0) {
                    echo $outer_div;
                    $outer_div = $div = HtmlNode::get_builder("div")->attr("class", "col-sm-12")->build();
                }
                $i++;
            }

            echo $outer_div;
        }

        renderTestsuiteListing(createTestsuiteListingDivs($test_suites));
	?>
    <div class="col-sm-6">
    <h3>Abbreviations</h3>
        <?php
        $abbrev_table = HtmlNode::get_builder("table")->attr("class", "table table-bordered")->build();
        $abbrev_table_tbody = HtmlNode::get_builder("tbody")->build();
        $abbrev_table->append($abbrev_table_tbody);
        
        foreach ($abbreviations as $abbreviation) {
            $tr = HtmlNode::get_builder("tr")->build();
            $td1 = HtmlNode::get_builder("td")->s_text($abbreviation->abbreviation)->build();
            $td2 = HtmlNode::get_builder("td")->s_text($abbreviation->long_description)->build();
            $tr->append($td1)->append($td2);
            $abbrev_table_tbody->append($tr);
        }
        
        echo $abbrev_table;
        
        ?>
    </div>

    <div class="col-sm-6">
	<h3>External references</h3>
	This testsuite is based upen the following documents:
        
        <?php
            $ul = HtmlNode::get_builder("div")->attr("style", "margin-top: 15px;")->attr("class", "list-group")->build();
            
            foreach ($external_references as $external_reference) {
                $a = HtmlNode::get_builder("a")->attr("class", "list-group-item")->attr("id", $external_reference->id)
                        ->attr("href", $external_reference->link)->s_attribute("title", $external_reference->name)
                        ->s_text($external_reference->name)->build();
                $ul->append($a);
            }
            
            echo $ul;
        ?>
        
    </div>

    <div class="col-sm-12">
        <h1>Definition of the Test-Cases</h1>

        <?php
        foreach ($test_suites as $test_suite) {
            echo $test_suite;
        }
        ?>
    </div>
    </div>

    <footer class="footer">
      <div class="container">
          <p class="text-muted">&copy; 2017 by Julian Cordes</p>
      </div>
    </footer>
  </body>
</html>
