<?php

namespace WPPerf;

use WP_Mock\Handler;

/**
 * @runTestsInSeparateProcesses
 */
class Bootstrap_Tests extends \PHPUnit_Framework_TestCase {

	public function setUp() {
		\WP_Mock::setUp();
		Handler::cleanup();
		if ( ! defined( 'WP_PLUGIN_DIR' ) ) {
			define( 'WP_PLUGIN_DIR', dirname( WPPERF_DIR ) );
		}
		if ( ! defined( 'WP_PLUGIN_URL' ) ) {
			define( 'WP_PLUGIN_URL', 'PLUGINURL' );
		}
	}

	public function tearDown() {
		\WP_Mock::tearDown();
		Handler::cleanup();
	}

	public function test_setup_action_added() {
		\WP_Mock::expectActionAdded( 'plugins_loaded', '\WPPerf\setup' );
		require_once WPPERF_DIR . '/bootstrap.php';
	}

	/**
	 * Define constants after requires/includes
	 *
	 * See http://kpayne.me/2012/07/02/phpunit-process-isolation-and-constant-already-defined/
	 * for more details
	 *
	 * @param \Text_Template $template
	 */
	public function prepareTemplate( \Text_Template $template ) {
		$template->setVar( array(
			'constants'    => '',
			'zz_constants' => \PHPUnit_Util_GlobalState::getConstantsAsString()
		) );
		parent::prepareTemplate( $template );
	}

}
