<?php

namespace ICN\VCFJ;

/*
 * Plugin Name: Version Control for jQuery
 * Plugin URI: https://github.com/IversenCarpeNoctem/version-control-for-query
 * Description: Version Control for jQuery is the easiest way to control the version of jQuery used on your website.
 * Version: 3.0-alpha
 * Author: Iversen - Carpe Noctem
 * Author URI: https://github.com/IversenCarpeNoctem
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: version-control-for-jquery
 * Domain Path: /languages
 */

// Block direct access
if(!defined('ABSPATH'))exit;

class VCFJ {

	private static $instance = null;
	public static $latest_core = '3.6.0';
	public static $latest_migrate = '3.3.2';

	public static function instance(): VCFJ {
		if( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		// Load translations
		add_action( 'plugins_loaded', [$this, 'load_textdomain'] );

		// Load settings page
		add_action( 'plugins_loaded', [$this, 'settings_page'] );
	}

	public function load_textdomain(): void {
		load_plugin_textdomain( 'version-control-for-jquery', false, plugin_dir_path( __FILE__ ) . '/languages' );
	}

	public function settings_page(): void {
		require_once( plugin_dir_path( __FILE__ ) . 'src/SettingsPage.php' );
	}

}

VCFJ::instance();