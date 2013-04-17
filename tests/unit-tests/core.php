<?php

namespace WPPerf;

use WP_Mock\Handler;

require_once WPPERF_DIR . '/functions/core.php';

class Core_Tests extends \PHPUnit_Framework_TestCase {

	public function setUp() {
		\WP_Mock::setUp();
		Handler::cleanup();
	}

	public function tearDown() {
		\WP_Mock::tearDown();
		Handler::cleanup();
	}

	public function test_setup() {
		\WP_Mock::expectActionAdded( 'init', '\WPPerf\init' );
	}

	public function test_init() {

	}

}

