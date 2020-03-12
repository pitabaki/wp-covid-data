<?php

    function csv_to_json ($csv) {

        if ( !($fp = fopen($csv, 'r'))) {
            die('$csv doesn\'t exist.');
        }

        $key = fgetcsv($fp, "1000"); //setting length to 1000. This seems to work for this sheet

        $json = array();

        while( $row = fgetcsv($fp, "1000") ) {
            if ( count($key) == count($row) ) {
                $json[] = array_combine($key, $row);
            }
        }

        fclose($fp);

        $json_arr = json_encode($json);

        if ( count($json) > 0 ) {//Checks for empty array. If empty, it skips pulling in a new version of the csv
            return $json_arr;
        }

        return false;//returns false when an empty array is presented
        
    }

?>