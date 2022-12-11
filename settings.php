<?php

namespace ICN\VCFJ;

// Block direct access
if(!defined('ABSPATH'))exit;

class Settings {

	private static $instance = null;

	public function __construct() {
		add_action( 'admin_menu', [$this, 'add_admin_menu'] );
		add_action( 'admin_init', [$this, 'register_settings'] );
		add_action( 'wp_enqueue_scripts', [$this, 'register_core_version'] );
		add_action( 'wp_enqueue_scripts', [$this, 'register_migrate_version'] );
	}

	public static function instance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function add_admin_menu(): void { 
		add_options_page( 'jQuery Version Control', 'jQuery Version Control', 'manage_options', 'version_control_for_jquery', [$this, 'render_page'] );
	}

	public function register_settings(): void {
		register_setting( 'vcfj_settings_page', 'vcfj_settings' );

		add_settings_section(
			'vcfj_pluginPage_section', 
			'', 
			[$this, 'section_callback'],
			'vcfj_settings_page'
		);

		add_settings_field( 
			'vcfj_cdn', 
			__( 'Select your preferred CDN (jQuery Core only).', 'version-control-for-jquery' ), 
			[$this, 'select_cdn'], 
			'vcfj_settings_page',
			'vcfj_pluginPage_section' 
		);

		add_settings_field( 
			'vcfj_core_version', 
			__( 'Select your desired jQuery Core version.', 'version-control-for-jquery' ), 
			[$this, 'select_core_version'], 
			'vcfj_settings_page',
			'vcfj_pluginPage_section' 
		);

		add_settings_field( 
			'vcfj_migrate_version', 
			__( 'Select your desired jQuery Migrate version.', 'version-control-for-jquery' ), 
			[$this, 'select_migrate_version'], 
			'vcfj_settings_page',
			'vcfj_pluginPage_section' 
		);

		add_settings_field( 
			'vcfj_core_disable', 
			__( 'Disable jQuery Core?', 'version-control-for-jquery' ), 
			[$this, 'disable_core'], 
			'vcfj_settings_page',
			'vcfj_pluginPage_section' 
		);

		add_settings_field( 
			'vcfj_migrate_disable', 
			__( 'Disable jQuery Migrate?', 'version-control-for-jquery' ), 
			[$this, 'disable_migrate'], 
			'vcfj_settings_page',
			'vcfj_pluginPage_section' 
		);
	}

	public function select_cdn(): void { 
		$options = get_option( 'vcfj_settings' );

		if( isset($options['vcfj_cdn']) & !empty($options['vcfj_cdn']) ) {
			$cdn = $options['vcfj_cdn'];
		} else {
			$cdn = VCFJ_DEFAULT_CDN;
		}

		echo '<select name="vcfj_settings[vcfj_cdn]">';
		echo sprintf( '<option value="cdnjs" name="vcfj_settings[vcfj_cdn]" %s>cdnjs</option>', selected( $cdn, 'cdnjs', false ) );
		echo sprintf( '<option value="google" name="vcfj_settings[vcfj_cdn]" %s>Google</option>', selected( $cdn, 'google', false ) );
		echo sprintf( '<option value="jquery" name="vcfj_settings[vcfj_cdn]" %s>jQuery</option>', selected( $cdn, 'jquery', false ) );
		echo '</select>';
	}

	public function select_core_version(): void { 
		$options = get_option( 'vcfj_settings' );

		// Check if the jQuery Core version has been set
		if( isset($options['vcfj_core_version']) && !empty($options['vcfj_core_version']) ) {
			$version = $options['vcfj_core_version'];
		} else {
			$version = VCFJ_LATEST_CORE;
		}

		$versions = [
			'git-build' => '(Git Build)',
			'3.6.1' => '3.6.1',
			'3.6.0' => '3.6.0',
			'3.5.1' => '3.5.1',
			'3.5.0' => '3.5.0',
			'3.4.1' => '3.4.1',
			'3.4.0' => '3.4.0',
			'3.3.1' => '3.3.1',
			'3.3.0' => '3.3.0',
			'3.2.1' => '3.2.1',
			'3.2.0' => '3.2.0',
			'3.1.1' => '3.1.1',
			'3.1.0' => '3.1.0',
			'3.0.0' => '3.0.0',
			'2.2.4' => '2.2.4',
			'2.2.3' => '2.2.3',
			'2.2.2' => '2.2.2',
			'2.2.1' => '2.2.1',
			'2.2.0' => '2.2.0',
			'2.1.4' => '2.1.4',
			'2.1.3' => '2.1.3',
			'2.1.2' => '2.1.2',
			'2.1.1' => '2.1.1',
			'2.1.0' => '2.1.0',
			'2.0.3' => '2.0.3',
			'2.0.2' => '2.0.2',
			'2.0.1' => '2.0.1',
			'2.0.0' => '2.0.0',
			'1.12.4' => '1.12.4',
			'1.12.3' => '1.12.3',
			'1.12.2' => '1.12.2',
			'1.12.1' => '1.12.1',
			'1.12.0' => '1.12.0',
			'1.11.3' => '1.11.3',
			'1.11.2' => '1.11.2',
			'1.11.1' => '1.11.1',
			'1.11.0' => '1.11.0',
			'1.10.2' => '1.10.2',
			'1.10.1' => '1.10.1',
			'1.10.0' => '1.10.0',
			'1.9.1' => '1.9.1',
			'1.9.0' => '1.9.0',
			'1.8.3' => '1.8.3',
			'1.8.2' => '1.8.2',
			'1.8.1' => '1.8.1',
			'1.8.0' => '1.8.0',
			'1.7.2' => '1.7.2',
			'1.7.1' => '1.7.1',
			'1.7' => '1.7.0',
			'1.6.4' => '1.6.4',
			'1.6.3' => '1.6.3',
			'1.6.2' => '1.6.2',
			'1.6.1' => '1.6.1',
			'1.6.0' => '1.6.0',
			'1.5.2' => '1.5.2',
			'1.5.1' => '1.5.1',
			'1.5' => '1.5.0',
			'1.4.4' => '1.4.4',
			'1.4.3' => '1.4.3',
			'1.4.2' => '1.4.2',
			'1.4.1' => '1.4.1',
			'1.4.0' => '1.4.0',
			'1.3.2' => '1.3.2',
			'1.3.1' => '1.3.1',
			'1.3' => '1.3.0',
			'1.2.6' => '1.2.6',
			'1.2.5' => '1.2.5',
			'1.2.4' => '1.2.4',
			'1.2.3' => '1.2.3',
			'1.2.2' => '1.2.2',
			'1.2.1' => '1.2.1',
			'1.2' => '1.2.0',
		];

		$this->output_select('core', $version, $versions);
	}

	public function select_migrate_version(): void {
		$options = get_option( 'vcfj_settings' );

		// Check if the jQuery Migrate version has been set
		if( isset($options['vcfj_migrate_version']) && !empty($options['vcfj_migrate_version']) ) {
			$version = $options['vcfj_migrate_version'];
		} else {
			$version = VCFJ_LATEST_MIGRATE;
		}

		$versions = [
			'git-build' => '(Git Build)',
			'3.4.0' => '3.4.0',
			'3.3.2' => '3.3.2',
			'3.3.1' => '3.3.1',
			'3.3.0' => '3.3.0',
			'3.2.0' => '3.2.0',
			'3.1.0' => '3.1.0',
			'3.0.1' => '3.0.1',
			'3.0.0' => '3.0.0',
			'1.4.1' => '1.4.1',
			'1.4.0' => '1.4.0',
			'1.3.0' => '1.3.0',
			'1.2.1' => '1.2.1',
			'1.2.0' => '1.2.0',
			'1.1.1' => '1.1.1',
			'1.1.0' => '1.1.0',
			'1.0.0' => '1.0.0',
		];

		$this->output_select('migrate', $version, $versions);
	}

	public function disable_core(): void {
		$options = get_option( 'vcfj_settings' );

		if( isset($options['vcfj_core_disable']) && $options['vcfj_core_disable'] == 1) {
			$checked = 'checked="checked"';
		} else {
			$checked = '';
		}

		echo sprintf( '<input type="checkbox" name="vcfj_settings[vcfj_core_disable]" value="1" %s />', $checked );
	}

	public function disable_migrate(): void {
		$options = get_option( 'vcfj_settings' );

		if( isset($options['vcfj_migrate_disable']) && $options['vcfj_migrate_disable'] == 1) {
			$checked = 'checked="checked"';
		} else {
			$checked = '';
		}

		echo sprintf( '<input type="checkbox" name="vcfj_settings[vcfj_migrate_disable]" value="1" %s />', $checked );
	}

	private function output_select($type, $current, $values): void {
		$select_name = '';

		if( 'core' === $type ) {
			$select_name = 'vcfj_core_version';
		} elseif( 'migrate' === $type) {
			$select_name = 'vcfj_migrate_version';
		}

		echo '<select name="vcfj_settings[' . $select_name . ']">';
		foreach($values as $key => $label) {
			$this->output_option($type, $current, $key, $label);
		}
		echo '</select>';
	}

	private function output_option($name, $current, $version, $label): void {
		$setting_name = '';
		$option_label_prefix = '';

		if( 'core' === $name ) {
			$setting_name = 'vcfj_core_version';
			$option_label_prefix = 'Core';
		} elseif( 'migrate' === $name) {
			$setting_name = 'vcfj_migrate_version';
			$option_label_prefix = 'Migrate';
		}

		echo sprintf( '<option value="%1$s" name="vcfj_settings[%2$s]" %3$s>jQuery %4$s %5$s</option>', $version, $setting_name, selected( $current, $version, false ), $option_label_prefix, $label );
	}

	public function section_callback(): void { 
		echo '<p>' . __( 'Use the dropdown selectors below to select your desired version of jQuery. Please note that the plugin defaults to the latest stable version.', 'version-control-for-jquery' ) . '</p>';
	}

	public function render_page(): void { ?>
		<div class="wrap">
			<h1><?php _e( 'Version Control for jQuery', 'version-control-for-jquery' ); ?></h1>
			<form action='options.php' method='post'>
				<?php
				settings_fields( 'vcfj_settings_page' );
				do_settings_sections( 'vcfj_settings_page' );
				submit_button();
				?>
			</form>
		</div>
	<?php }

	public function register_core_version(): void {
		// Check that the user is not viewing the administration panel
		if ( is_admin() ) {
			return;
		}

		// Deregister the standard jQuery Core
		wp_deregister_script( 'jquery' );

		// Get options
		$options = get_option( 'vcfj_settings' );

		// Check if jQuery Core has been disabled
		if( isset( $options['vcfj_core_disable'] ) && $options['vcfj_core_disable'] === '1' ) {
			return;
		}

		if( !isset($options['vcfj_core_version']) || empty($options['vcfj_core_version']) ) {
			$version = VCFJ_LATEST_CORE;
		} else {
			$version = $options['vcfj_core_version'];
		}

		if( 'git-build' === $version ) {
			wp_register_script( 'jquery', 'https://code.jquery.com/jquery-git.min.js', false, $version );
			return;
		}

		$cdn = $options['vcfj_cdn'] ?? VCFJ_DEFAULT_CDN;

		$has_cdn = array_key_exists($cdn, Mappings::$core);

		if( !$has_cdn ) {
			$cdn = VCFJ_DEFAULT_CDN;
		}

		if( 'cdnjs' === $cdn ) {
			switch ($version) {
				case '1.3':
					$version = '1.3.0';
					break;
			}
		} elseif( 'google' === $cdn ) {
			switch ($version) {
				case '1.7':
					$version = '1.7.0';
					break;
				case '1.5':
					$version = '1.5.0';
					break;
				case '1.3':
					$version = '1.3.0';
					break;
			}
		}

		$has_version = in_array($version, Mappings::$core[$cdn], true);

		if( !$has_version || 'jquery' === $cdn ) {
			wp_register_script( 'jquery', 'https://code.jquery.com/jquery-' . $version . '.min.js', false, $version );
			return;
		}

		if( 'cdnjs' === $cdn ) {
			wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/' . $version . '/jquery.min.js', false, $version );
		} elseif( 'google' === $cdn ) {
			wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/' . $version . '/jquery.min.js', false, $version );
		}
	}

	public function register_migrate_version(): void {
		// Check that the user is not viewing the administration panel
		if( is_admin() ) {
			return;
		}

		// Deregister core jQuery Migrate
		wp_deregister_script( 'jquery-migrate' );

		// Get options
		$options = get_option( 'vcfj_settings' );

		// Check if jQuery Migrate has been disabled
		if( isset( $options['vcfj_migrate_disable'] ) && $options['vcfj_migrate_disable'] === '1' ) {
			return;
		}

		if( !isset($options['vcfj_migrate_version']) || empty($options['vcfj_migrate_version']) ) {
			$version = VCFJ_LATEST_MIGRATE;
		} else {
			$version = $options['vcfj_migrate_version'];
		}

		// Enqueue the selected version of jQuery Migrate
		if( 'git-build' === $version ) {
			// Register the git build
			wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-git.min.js', [ 'jquery' ], $version );
		} else {
			// Register the stable version
			wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-' . $version . '.min.js', [ 'jquery' ], $version );
		}
	}

}

Settings::instance();
