<?php

    function  print_json($print_location, $content) {
        json_decode($content);//decode to check validation
        if ( json_last_error() == JSON_ERROR_NONE ) {
            $file = $print_location;
            file_put_contents($file, $content); 
        }
    }

?>