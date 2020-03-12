<?php

  require_once('exec_print.php');

  //pull request from github
  function git_pull_request($repository, $relative_path) {
    if ( !is_dir("$relative_path/model/master") ) {
      //If git repository doesn't exist
      // Print the exec output inside of a pre element
      print("<pre>" . exec_print("cd $relative_path/model/\ngit clone $repository master", $relative_path) . "</pre>");
    } else {
      //if git repository exists
      // Print the exec output inside of a pre element
      print("<pre>" . exec_print("cd $relative_path/model/master\ngit pull origin master", $relative_path) . "</pre>");
    }
  }

?>