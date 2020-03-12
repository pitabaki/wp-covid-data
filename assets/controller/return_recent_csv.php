<?php

  function return_recent_csv($path) {

    if ( !is_dir($path) ) {
      die;
    }

    $covid_daily_reports = scandir($path, SCANDIR_SORT_DESCENDING);

    if ( $covid_daily_reports[0] == 'README.md' ) { //ignore README, if that's the latest file
      return $covid_daily_reports[1];
    }

    return $covid_daily_reports[0];
  }

?>