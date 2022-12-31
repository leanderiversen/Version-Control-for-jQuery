<?php
/**
 * Plugin Name: Version Control for jQuery
 * Plugin URI: https://github.com/leanderiversen/version-control-for-jquery/
 * Description: Version Control for jQuery is the easiest way to control the version of jQuery used on your website.
 * Version: 3.3-alpha
 * Author: Leander Iversen
 * Author URI: https://github.com/leanderiversen/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: version-control-for-jquery
 * Domain Path: /languages
 */

// Block direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define the latest version of jQuery Core.
if ( ! defined( 'VCFJ_LATEST_CORE' ) ) {
	define( 'VCFJ_LATEST_CORE', '3.6.3' );
}

// Define the latest version of jQuery Migrate.
if ( ! defined( 'VCFJ_LATEST_MIGRATE' ) ) {
	define( 'VCFJ_LATEST_MIGRATE', '3.4.0' );
}

// Define the default CDN.
if ( ! defined( 'VCFJ_DEFAULT_CDN' ) ) {
	define( 'VCFJ_DEFAULT_CDN', 'jquery' );
}

// Load translations.
function vcfj_load_textdomain() {
	load_plugin_textdomain( 'version-control-for-jquery', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'vcfj_load_textdomain' );

// Require the plugin files.
function vcfj_require_files() {
	require_once plugin_dir_path( __FILE__ ) . 'src/class-helpers.php';
	require_once plugin_dir_path( __FILE__ ) . 'src/class-mappings.php';
	require_once plugin_dir_path( __FILE__ ) . 'src/class-settings.php';
	require_once plugin_dir_path( __FILE__ ) . 'src/class-enqueue.php';
}
add_action( 'plugins_loaded', 'vcfj_require_files' );
