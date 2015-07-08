<?PHP

function db_connect($hostname, $dbname, $username, $password) {

    try {
        $dbh = new PDO('mysql:host=' . $hostname . ';dbname=' . $dbname, $username, $password,  array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return ($dbh);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function renderLayout($contentFile, $variables = array()) {
    $contentFilePath = TEMPLATES_PATH . "/" . $contentFile;

    // Set template variables
    if (count($variables) > 0) {
        foreach ($variables as $key => $value) {
            if (strlen($key) > 0) {
                ${key} = $value;
            }
        }
    }
    if (file_exists($contentFilePath)) {
        require_once($contentFilePath);
    } else {
        require_once("./error.php");
    }
}

class Overlap {

    public $overlap;

    private function checkArrays(){
        $rows_array = array();
        foreach ($rows as $var1) { //----------------get dates and record them into array!!!
            $rows_array[] = $var1[0];
        }
        $rows_no = array_unique($rows_array); //-----------unique dates!!!
    }

    public function __construct($rows) {

        // Overlapping groups at the end
        $overlap = array();
        foreach ($rows as $class1) {
            $placed = false;
            foreach ($overlap as $rowclass2 => $class2) {
                $last = end($class2);
                if ((strtotime($class1[1]) >= strtotime($last[2]))&&($class1[0] == $last[0]) ) {
                    $overlap[$rowclass2][] = $class1;
                    $placed = true;
                    break;
                }
            }
            if (!$placed) {
                $overlap[] = array($class1);
            }
        }
        $this->overlap = $overlap;
    }

}

function OverLapFunction($time) {

    // overlapping groups at the end
    $groups = array(); // groups have starting time, ending
    // time and items they contain
    foreach ($time as $item) {
        // if we don't find a group to put this item in, we create a new one
        $found = false;
        foreach ($groups as $group) {
            // basically the whole if statement looks for overlapping between
            // the group and the current item
            if (($item[1] >= $group[1] && $item[1] <= $group[2]) ||
                ($item[2] >= $group[1] && $item[2] <= $group[2]))
                $group['items'][] = $item; // add the item to its group
            $found = true;
            break;
        }
        if (!$found) { // no group that fits this item; create a new one
            $groups[] = array(
                'start_time' => $item[1], // start and end times
                'end_time' => $item[2], // are the item's
                'items' => array($item),
            );
        }
    }
    return $groups;
}

class overlap2 {

    public $overlap;
    private $dates_unique;
    private function checkArrays() {
        $rows_array = array();
        foreach ($rows as $var1) { //----------------get dates and record them into array!!!
            $rows_array[] = $var1[0];
        }
        $rows_no = array_unique($rows_array); //-----------unique dates!!!

        foreach ($rows_no as $val1) {

        }
    }

    public function __construct($rows) {
        function overlap($rows) {
            $overlap = array();
            foreach ($rows as $class1) {
                $placed = false;
                foreach ($overlap as $rowclass2 => $class2) {
                    $last = end($class2);
                    if ((strtotime($class1[1]) >= strtotime($last[2])) && ($class1[0] == $last[0])) {
                        $overlap[$rowclass2][] = $class1;
                        $placed = true;
                        break;
                    }
                }
                if (!$placed) {
                    $overlap[] = array($class1);
                }
            }
            $this->overlap = $overlap;
        }
    }
}

    function display() {
        echo '<div class="tab-content">';
        $a = 1;
        $class_active = 'tab-pane fade in active';
        foreach ($this->dates_unique as $dates) {
            echo '<div id="section' . $a . '" class="' . $class_active . '">';
            $a++;
            $class_active = "tab-pane fade";
            foreach ($overlap_array as $row) {
                if ($dates == $row[0][0]) {
                    echo '<div class="rows">';
                    foreach ($row as $event) {
                        $left = ((($event[3] - 36000) / 468)) + 0.1;
                        if ($event[4] > 9000) {
                            echo '<a href="event/' . $event[6] . '"><div style="width:' . (($event[4] / 468) - 0.4) .
                                '%; left: ' . $left . '%;" class="collumn">' . $event[5] . ' ' . $event[1] . ' - ' . $event[2] .
                                ' ' . $event[0] . '</div></a>';
                        } else {
                            echo '<a href="event/' . $event[6] . '"><div style="width:' . (($event[4] / 468) - 0.4) .
                                '%; left: ' . $left . '%; text-overflow: ellipsis; -o-text-overflow: ellipsis; font-size:0.8em;  " class="collumn">'
                                . $event[5] . '</div></a>';
                        }
                    }
                    echo '<br></div>';
                }
            }
            echo '</div>';
        }
        echo '</div>';
    }

?>
