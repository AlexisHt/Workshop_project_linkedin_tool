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

// widget constructor
require_once( dirname(__FILE__) . '/lkd-tool-display.php' );


/**
* 
*/

add_action('plugins_loaded', array('LinkedinTool', 'get_instance'));

class LinkedinTool
{

	private static $instance;

	public static function get_instance() {
		if (!self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	function __construct()
	{
		add_action('init', array(&$this, 'init') );
	}

	function init()
	{

	wp_register_style( 'style', plugins_url( "css/style.css", __FILE__ ));
    wp_enqueue_style( 'style');

	//add_action('wp_enqueue_scripts', array(&$this, 'add_js_scripts'));

	$newInstance = new lkd_tool_plugin_init();
	$newContructor = new lkd_tool_constructor();
	$newConnection = new APIConnection( $user );

	}

}






