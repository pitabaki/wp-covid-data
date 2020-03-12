<?php
	/**
	 * Plugin Name:       Coronavirus Map
	 * Plugin URI:        https://www.breathemongolia.org/
	 * Description:       Extends Breathe Mongolia's air quality map to include Coronavirus data
	 * Version:           1.0.0
	 * Author:            Peter Berki
	 * Author URI:        https://breathemongolia.org/
	 */

   /*
   if ( ! defined('WPINC') ) {
     die;
   }*/

   $relative_path = __DIR__ . '/assets';

   require_once($relative_path . '/controller/git_pull_request.php');

   //covid repository where the data exists
   $git_repository = 'https://github.com/CSSEGISandData/COVID-19.git';

   //pull or clone request
   git_pull_request($git_repository, $relative_path);

   add_action('git_pull_request_hook', 'git_pull_request');
  
?>