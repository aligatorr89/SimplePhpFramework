<?php

class View {

    function __construct() {
        
    }

    public function render($name, $noInclude = false) {

        require 'views/' . $name . '.php';
        /* if ($noInclude == true) {
          require 'views/' . $name . '.php';
          } else {
          require 'views/header.php';
          require 'views/' . $name . '.php';
          require 'views/footer.php';
          } */
    }

    public function renderTableData($table) {
        $rows = count($table);
        for ($i = 0; $i < $rows; $i++) {
            $noteid = $table[$i]['noteid'];
            $a = $i + 1;
            echo '<tr>';
            echo '<td>' . $a . '</td>';
            foreach ($table[$i] as $key => $value) {
                if ($key == 'noteid') {
                    continue;
                }
                echo "<td name=$key>" . $value . '</td>';
            }
            echo "<td><a href= notepad/$noteid>" . 'Delete </a></td>';
            echo '</tr>';
        }
    }

}
