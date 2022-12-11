<?php
/*
 * Plugin Name: Version Control for jQuery
 * Plugin URI: https://github.com/IversenCarpeNoctem/version-control-for-query
 * Description: Version Control for jQuery is the easiest way to control the version of jQuery used on your website.
 * Version: 3.0.3
 * Author: Iversen - Carpe Noctem
 * Author URI: https://github.com/IversenCarpeNoctem
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: version-control-for-jquery
 * Domain Path: /languages
 */

// Block direct access
if(!defined('ABSPATH'))exit;

// Pathinfo
$pathinfo = pathinfo( dirname( plugin_basename( __FILE__ ) ) );

// Define plugin name
if( !defined('VCFJ_PATH') ) {
	define('VCFJ_PATH', plugin_dir_path( __FILE__ ));
}

// Define plugin name
if( !defined('VCFJ_NAME') ) {
	define('VCFJ_NAME', $pathinfo['filename']);
}

// Define plugin URL
if( !defined('VCFJ_URL') ) {
	define('VCFJ_URL', plugins_url(VCFJ_NAME) . '/');
}

// Define the latest version of jQuery Core
if( !defined('VCFJ_LATEST_CORE') ) {
	define('VCFJ_LATEST_CORE', '3.6.1');
}

// Define the latest version of jQuery Migrate
if( !defined('VCFJ_LATEST_MIGRATE') ) {
	define('VCFJ_LATEST_MIGRATE', '3.4.0');
}

// Define the default CDN
if( !defined('VCFJ_DEFAULT_CDN') ) {
	define('VCFJ_DEFAULT_CDN', 'jquery');
}

// Load translation
function vcfj_load_textdomain() {
	load_plugin_textdomain( 'version-control-for-jquery', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'vcfj_load_textdomain' );

// Require the settings page
function vcfj_require_settings() {
	require_once( VCFJ_PATH . 'mappings.php' );
	require_once( VCFJ_PATH . 'settings.php' );
}
add_action( 'plugins_loaded', 'vcfj_require_settings' );
