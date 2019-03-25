<?php

// Block direct access
if(!defined('ABSPATH'))exit;

add_action( 'admin_menu', 'vcfj_add_admin_menu' );
add_action( 'admin_init', 'vcfj_settings_init' );

function vcfj_add_admin_menu() { 
	add_options_page( 'jQuery Version Control', 'jQuery Version Control', 'manage_options', 'version_control_for_jquery', 'vcfj_options_page' );
}

function vcfj_settings_init() { 

	register_setting( 'vcfj_settings_page', 'vcfj_settings' );

	add_settings_section(
		'vcfj_pluginPage_section', 
		'', 
		'vcfj_settings_section_callback',
		'vcfj_settings_page'
	);

	add_settings_field( 
		'vcfj_core_version', 
		__( 'Select your desired jQuery version.', 'version-control-for-jquery' ), 
		'vcfj_select_jquery_core_version', 
		'vcfj_settings_page',
		'vcfj_pluginPage_section' 
	);

		add_settings_field( 
		'vcfj_migrate_version', 
		__( 'Select your desired jQuery Migrate version.', 'version-control-for-jquery' ), 
		'vcfj_select_jquery_migrate_version', 
		'vcfj_settings_page',
		'vcfj_pluginPage_section' 
	);

}

function vcfj_select_jquery_core_version() { 
  // Get options
	$options = get_option( 'vcfj_settings' );

  // Check if the jQuery Core version has been set
  if(!isset($options['vcfj_core_version']) || empty($options['vcfj_core_version']) ) {
    $vcfj_core_version = '3.3.1';
  } else {
    $vcfj_core_version = $options['vcfj_core_version'];
  }

	?>
	<select name='vcfj_settings[vcfj_core_version]'>
    <option value='git-build' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, 'git-build' ); ?>>jQuery Core (Git Build)</option>
    <option value='3.3.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '3.3.1' ); ?>>jQuery Core 3.3.1</option>
    <option value='3.3.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '3.3.0' ); ?>>jQuery Core 3.3.0</option>
    <option value='3.2.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '3.2.1' ); ?>>jQuery Core 3.2.1</option>
    <option value='3.2.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '3.2.0' ); ?>>jQuery Core 3.2.0</option>
    <option value='3.1.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '3.1.1' ); ?>>jQuery Core 3.1.1</option>
		<option value='3.1.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '3.1.0' ); ?>>jQuery Core 3.1.0</option>
		<option value='3.0.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '3.0.0' ); ?>>jQuery Core 3.0.0</option>
		<option value='2.2.4' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.2.4' ); ?>>jQuery Core 2.2.4</option>
		<option value='2.2.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.2.3' ); ?>>jQuery Core 2.2.3</option>
    <option value='2.2.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.2.2' ); ?>>jQuery Core 2.2.2</option>
    <option value='2.2.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.2.1' ); ?>>jQuery Core 2.2.1</option>
    <option value='2.2.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.2.0' ); ?>>jQuery Core 2.2.0</option>
    <option value='2.1.4' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.1.4' ); ?>>jQuery Core 2.1.4</option>
    <option value='2.1.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.1.3' ); ?>>jQuery Core 2.1.3</option>
    <option value='2.1.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.1.2' ); ?>>jQuery Core 2.1.2</option>
    <option value='2.1.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.1.2' ); ?>>jQuery Core 2.1.1</option>
    <option value='2.1.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.1.2' ); ?>>jQuery Core 2.1.0</option>
    <option value='2.0.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.0.3' ); ?>>jQuery Core 2.0.3</option>
    <option value='2.0.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.0.2' ); ?>>jQuery Core 2.0.2</option>
    <option value='2.0.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.0.1' ); ?>>jQuery Core 2.0.1</option>
    <option value='2.0.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '2.0.0' ); ?>>jQuery Core 2.0.0</option>
    <option value='1.12.4' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.12.4' ); ?>>jQuery Core 1.12.4</option>
    <option value='1.12.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.12.3' ); ?>>jQuery Core 1.12.3</option>
    <option value='1.12.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.12.2' ); ?>>jQuery Core 1.12.2</option>
    <option value='1.12.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.12.1' ); ?>>jQuery Core 1.12.1</option>
    <option value='1.12.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.12.0' ); ?>>jQuery Core 1.12.0</option>
    <option value='1.11.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.11.3' ); ?>>jQuery Core 1.11.3</option>
    <option value='1.11.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.11.2' ); ?>>jQuery Core 1.11.2</option>
    <option value='1.11.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.11.1' ); ?>>jQuery Core 1.11.1</option>
    <option value='1.11.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.11.0' ); ?>>jQuery Core 1.11.0</option>
    <option value='1.10.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.10.2' ); ?>>jQuery Core 1.10.2</option>
    <option value='1.10.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.10.1' ); ?>>jQuery Core 1.10.1</option>
    <option value='1.10.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.10.0' ); ?>>jQuery Core 1.10.0</option>
    <option value='1.9.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.9.1' ); ?>>jQuery Core 1.9.1</option>
    <option value='1.9.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.9.0' ); ?>>jQuery Core 1.9.0</option>
    <option value='1.8.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.8.3' ); ?>>jQuery Core 1.8.3</option>
    <option value='1.8.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.8.2' ); ?>>jQuery Core 1.8.2</option>
    <option value='1.8.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.8.1' ); ?>>jQuery Core 1.8.1</option>
    <option value='1.8.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.8.0' ); ?>>jQuery Core 1.8.0</option>
    <option value='1.7.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.7.2' ); ?>>jQuery Core 1.7.2</option>
    <option value='1.7.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.7.1' ); ?>>jQuery Core 1.7.1</option>
    <option value='1.7' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.7' ); ?>>jQuery Core 1.7.0</option>
    <option value='1.6.4' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.6.4' ); ?>>jQuery Core 1.6.4</option>
    <option value='1.6.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.6.3' ); ?>>jQuery Core 1.6.3</option>
    <option value='1.6.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.6.2' ); ?>>jQuery Core 1.6.2</option>
    <option value='1.6.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.6.1' ); ?>>jQuery Core 1.6.1</option>
    <option value='1.6.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.6.0' ); ?>>jQuery Core 1.6.0</option>
    <option value='1.5.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.5.2' ); ?>>jQuery Core 1.5.2</option>
    <option value='1.5.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.5.1' ); ?>>jQuery Core 1.5.1</option>
    <option value='1.5' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.5' ); ?>>jQuery Core 1.5.0</option>
    <option value='1.4.4' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.4.4' ); ?>>jQuery Core 1.4.4</option>
    <option value='1.4.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.4.3' ); ?>>jQuery Core 1.4.3</option>
    <option value='1.4.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.4.2' ); ?>>jQuery Core 1.4.2</option>
    <option value='1.4.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.4.1' ); ?>>jQuery Core 1.4.1</option>
    <option value='1.4.0' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.4.0' ); ?>>jQuery Core 1.4.0</option>
    <option value='1.3.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.3.2' ); ?>>jQuery Core 1.3.2</option>
    <option value='1.3.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.3.1' ); ?>>jQuery Core 1.3.1</option>
    <option value='1.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.3' ); ?>>jQuery Core 1.3.0</option>
    <option value='1.2.6' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.2.6' ); ?>>jQuery Core 1.2.6</option>
    <option value='1.2.5' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.2.5' ); ?>>jQuery Core 1.2.5</option>
    <option value='1.2.4' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.2.4' ); ?>>jQuery Core 1.2.4</option>
    <option value='1.2.3' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.2.3' ); ?>>jQuery Core 1.2.3</option>
    <option value='1.2.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.2.2' ); ?>>jQuery Core 1.2.2</option>
    <option value='1.2.1' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.2.1' ); ?>>jQuery Core 1.2.1</option>
    <option value='1.2' name='vcfj_settings[vcfj_core_version]'<?php selected( $vcfj_core_version, '1.2' ); ?>>jQuery Core 1.2.0</option>
	</select>

<?php

}

function vcfj_select_jquery_migrate_version() {
  // Get options
	$options = get_option( 'vcfj_settings' );

  // Check if the jQuery Migrate version has been set
  if(!isset($options['vcfj_migrate_version']) || empty($options['vcfj_migrate_version']) ) {
    $vcfj_migrate_version = '3.0.1';
  } else {
    $vcfj_migrate_version = $options['vcfj_migrate_version'];
  }

	?>
	<select name='vcfj_settings[vcfj_migrate_version]'>
    <option value='git-build' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, 'git-build' ); ?>>jQuery Migrate (Git Build)</option>
    <option value='3.0.1' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '3.0.1' ); ?>>jQuery Migrate 3.0.1</option>
		<option value='3.0.0' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '3.0.0' ); ?>>jQuery Migrate 3.0.0</option>
		<option value='1.4.1' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '1.4.1' ); ?>>jQuery Migrate 1.4.1</option>
		<option value='1.4.0' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '1.4.0' ); ?>>jQuery Migrate 1.4.0</option>
    <option value='1.3.0' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '1.3.0' ); ?>>jQuery Migrate 1.3.0</option>
    <option value='1.2.1' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '1.2.1' ); ?>>jQuery Migrate 1.2.1</option>
    <option value='1.2.0' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '1.2.0' ); ?>>jQuery Migrate 1.2.0</option>
    <option value='1.1.1' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '1.1.1' ); ?>>jQuery Migrate 1.1.1</option>
    <option value='1.1.0' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '1.1.0' ); ?>>jQuery Migrate 1.1.0</option>
    <option value='1.0.0' name='vcfj_settings[vcfj_migrate_version]'<?php selected( $vcfj_migrate_version, '1.0.0' ); ?>>jQuery Migrate 1.0.0</option>
	</select>

<?php
}

function vcfj_settings_section_callback() { 
	echo '<p>' . __( 'Use the dropdown selectors below to select your desired version of jQuery. Please note that the plugin defaults to the latest stable version.', 'version-control-for-jquery' ) . '</p>';
}

function vcfj_options_page() { 

	?>
  <div class="wrap">
    <h1><?php _e( 'Version Control for jQuery', 'version-control-for-jquery' );?></h1>
	  <form action='options.php' method='post'>
		  <?php
		  settings_fields( 'vcfj_settings_page' );
		  do_settings_sections( 'vcfj_settings_page' );
		  submit_button();
		  ?>
	  </form>
  </div>
	<?php

}

function vcfj_jquery_core_version() {
  // Check that the user is not viewing the administration panel
  if (!is_admin()) {

    // Deregister the standard jQuery Core
    wp_deregister_script( 'jquery' );

    // Get options
    $options = get_option( 'vcfj_settings' );

    if(!isset($options['vcfj_core_version']) || empty($options['vcfj_core_version']) ) {
      $vcfj_core_version = '3.3.1';
    } else {
      $vcfj_core_version = $options['vcfj_core_version'];
    }

    // Register the new and minified jQuery Core
    if($options['vcfj_core_version'] == 'git-build') {
      // Register the git build
      wp_register_script( 'jquery', 'https://code.jquery.com/jquery-git.min.js', false, $vcfj_core_version );
    } else {
      // Register the stable version
      wp_register_script( 'jquery', 'https://code.jquery.com/jquery-' . $vcfj_core_version . '.min.js', false, $vcfj_core_version );
    }
  }
}
add_action('wp_enqueue_scripts', 'vcfj_jquery_core_version');


function vcfj_jquery_migrate_version() {
   // Check that the user is not viewing the administration panel
  if (!is_admin()) {

    // Deregister core jQuery Migrate
    wp_deregister_script( 'jquery-migrate' );

    // Get options
    $options = get_option( 'vcfj_settings' );

    if(!isset($options['vcfj_migrate_version']) || empty($options['vcfj_migrate_version']) ) {
      $vcfj_migrate_version = '3.0.1';
    } else {
      $vcfj_migrate_version = $options['vcfj_migrate_version'];
    }

    // Enqueue the new and minified jQuery Migrate
    if($options['vcfj_migrate_version'] == 'git-build') {
      // Register the git build
      wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-git.min.js', array( 'jquery' ), $vcfj_migrate_version );
    } else {
      // Register the stable version
      wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-' . $vcfj_migrate_version . '.min.js', array( 'jquery' ), $vcfj_migrate_version );
    }
  }
}
add_action('wp_enqueue_scripts', 'vcfj_jquery_migrate_version');