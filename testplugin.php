<?php

/*

Plugin Name: Countdown Timer
Description: Displays a Countdown Timer
Version 0.0.1
Author:Alexander Jackson
License: GPL2+
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

*/

$wp_timer_version = 0.1;

//add menu options to admin panel
function countdownTimerAdminMenu()
{
  add_menu_page( 'Countdown Timer', 'Countdown Timer', 'manage_options', 'countdown-timer-admin', 'getTimerAdminView');
}

add_action('admin_menu','countdownTimerAdminMenu');

function getTimerAdminView()
{
  //echo('hi'); //test to see if we are reaching backend.
  if(!current_user_can('manage_options'))
  {
    wp_die(__('GetOut!'));
  }

  //insert file with admin view
  include 'controller/fileSysController.php';
  include 'view/admin/timerAdminView.php';
  


  //AJAX & JavaScript Setup

  $nonce = wp_create_nonce('NOTIME');

  $CT_AdminArr = array('ajax_url' => admin_url('admin-ajax.php'), 
                  'CTTimeNonce' => $nonce);

  //countdown timer admin javascript wp_hooks
  $CT_AdminTimerPath = plugins_url('js/testplugin.js',__FILE__);
  wp_register_script('CTTimerJS', $CT_AdminTimerPath, array('jquery-ui-tabs','jquery-ui-datepicker','jquery-ui-dialog'),date("h:i:s"));
  wp_localize_script('CTTimerJS', 'AU_TimerAdminObj', $CT_AdminArr);
  wp_enqueue_script('CTTimerJS');



}
//add css to admin panel
function CTAdminCSS($hook)
{
  if($hook != 'toplevel_page_countdown-timer-admin')
  {
    return;
  }
  
  //animate css
  wp_register_style('AnimateCSS', plugins_url('css/animate-min.css',__FILE__));
  wp_enqueue_style('AnimateCSS');

  //jquery ui css
  wp_register_style('jquery-ui-datepicker-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css');  
  wp_enqueue_style('jquery-ui-datepicker-style');

  //adobe font typekit stylesheet
  wp_register_style('TypeKitCSS','https://use.typekit.net/bpv2keg.css');
  wp_enqueue_style('TypeKitCSS');

  //plugin stylesheet
  wp_register_style('countdownTimerCSS',plugins_url('testplugin/css/stylesheet.css'));
  wp_enqueue_style('countdownTimerCSS');

  
}
add_action('admin_enqueue_scripts', 'CTAdminCSS');

//create countdown timer tables
function ct_Create_tables()
{
  //-------------------------------------------------------------------------
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //-------------------------------------------------------------------------
	global $wpdb;
  $table_CT_duration = $wpdb->prefix . "ctDuration";
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE IF NOT EXISTS  $table_CT_duration (
		id INT(255) NOT NULL AUTO_INCREMENT,
		cur_name VARCHAR(60) NOT NULL,
    cur_hour INT(2) NOT NULL,
    cur_min INT(2) NOT NULL,
    cur_sec INT(2) NOT NULL,   
		gDate DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,		
		PRIMARY KEY  (id)
		) $charset_collate;";
	dbDelta( $sql );

}
register_activation_hook(__FILE__, 'ct_Create_tables');

add_action('wp_ajax_getTimertimes','getTimertimes');

function getTimertimes()
{
  include 'controller/getTimerVal.php';
  wp_die();
}
?>