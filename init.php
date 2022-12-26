<?php
/*
 * Plugin Name: Version Control for jQuery
 * Plugin URI: https://github.com/leanderiversen/version-control-for-jquery/
 * Description: Version Control for jQuery is the easiest way to control the version of jQuery used on your website.
 * Version: 3.2
 * Author: Leander Iversen
 * Author URI: https://github.com/leanderiversen/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: version-control-for-jquery
 * Domain Path: /languages
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define the latest version of jQuery Core
if ( ! defined( 'VCFJ_LATEST_CORE' ) ) {
	define( 'VCFJ_LATEST_CORE', '3.6.2' );
}

// Define the latest version of jQuery Migrate
if ( ! defined( 'VCFJ_LATEST_MIGRATE' ) ) {
	define( 'VCFJ_LATEST_MIGRATE', '3.4.0' );
}

// Define the default CDN
if ( ! defined( 'VCFJ_DEFAULT_CDN' ) ) {
	define( 'VCFJ_DEFAULT_CDN', 'jquery' );
}

// Load translation
function vcfj_load_textdomain() {
	load_plugin_textdomain( 'version-control-for-jquery', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'vcfj_load_textdomain' );

// Require the settings page
function vcfj_require_settings() {
	require_once( plugin_dir_path( __FILE__ ) . 'mappings.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'settings.php' );
}
add_action( 'plugins_loaded', 'vcfj_require_settings' );
