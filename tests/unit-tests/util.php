<?php

namespace WPPerf;

use WP_Mock\Handler;

class Utilities_Tests extends \PHPUnit_Framework_TestCase {

	public function setUp() {
		\WP_Mock::setUp();
		Handler::cleanup();
	}

	public function tearDown() {
		\WP_Mock::tearDown();
		Handler::cleanup();
	}

	public function test_n() {
		$expected = '\WPPerf\foo';

		$actual = \WPPerf\n( 'foo' );
		$this->assertEquals(
			$expected,
			$actual,
			'n() did not add the namespace as expected'
		);

		$actual = \WPPerf\n( '\foo' );
		$this->assertEquals(
			$expected,
			$actual,
			'n() did not strip leading backslashes as expected'
		);
	}

}
