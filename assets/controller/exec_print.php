<?php

  require_once(__DIR__ . '/csv_to_json.php');
  require_once(__DIR__ . '/print_json.php');
  require_once(__DIR__ . '/return_recent_csv.php');

  //executes print command
  //generates model with csvs. This then needs to be converted
  function exec_print($command, $assets_path) {
    $result = array(); // empty array; to be filled with 
    exec($command, $result);
    foreach ($result as $line) {
      print($line . "\n");
    }

    $json_output =  $assets_path . '/model/daily_reports/';

    //check if directory exists. If not, make one
    if ( ! is_dir($json_output) ) {
      mkdir($json_output);
    }

    //path to all of the daily reports
    $covid_daily_reports = $assets_path . '/model/master/csse_covid_19_data/csse_covid_19_daily_reports/';

    //path to the most recent report
    $covid_daily_report = return_recent_csv($assets_path . '/model/master/csse_covid_19_data/csse_covid_19_daily_reports/');
    
    //create JSON content from the relative path returned from return_recent_csv plus the $covid_daily_reports
    $json_content = csv_to_json($covid_daily_reports . $covid_daily_report);

    //print JSON file in Model directory
    print_json($json_output . 'covid_daily_report.json', $json_content);

  }


?>