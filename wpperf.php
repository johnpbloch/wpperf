<?php
/*
 * Plugin Name: WP Perf
 * Description: WordPress benchmark performance tests
 * Version: 1.0-alpha
 */

if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	$dir = WP_PLUGIN_DIR . '/' . basename( dirname( __FILE__ ) ) . '/';
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	require_once ABSPATH . 'wp-admin/includes/template.php';
	deactivate_plugins( $dir . basename( __FILE__ ), true );
	add_settings_error(
		'',
		'wpperf-disabled',
		'WPPerf deactivated! PHP 5.3 is required'
	);
	add_action( 'all_admin_notices', 'settings_errors' );
	return;
}

require dirname( __FILE__ ) . '/bootstrap.php';
