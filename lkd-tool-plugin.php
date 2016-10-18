<?php

/*
Plugin Name: Linkedin for Wordpress
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Linkedin for Wordpress
Version: 1.0
Author: Alexis
Text Domain: lkd_trad_
License: A "Slug" license name e.g. GPL2
*/
defined( 'ABSPATH' ) or die ( 'Access Prohibited' );

/*function trad_plugin() {
    trad_plugin( 'lkd_tool_trad_', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}*/

// Load text domain
load_plugin_textdomain( 'lkd_tool_trad', false, plugin_basename(dirname(__FILE__)).'/languages' );

// Plugin settings for administrator
/*if ( is_admin() ) {
    require_once( dirname(__FILE__) . '/lkd-tool-admin-settings.php' ); // Plugin settings
}*/

// Plugin and user settings
require_once( dirname(__FILE__) . '/lkd-tool-settings.php' ); // Plugin settings

// Tab constructor
require_once( dirname(__FILE__) . '/lkd-tool-display.php' );

