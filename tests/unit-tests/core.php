<?php

namespace WPPerf;

use WP_Mock\Handler;

require_once WPPERF_DIR . '/functions/core.php';

class Core_Tests extends \PHPUnit_Framework_TestCase {

	public function setUp() {
		\WP_Mock::setUp();
		Handler::cleanup();
		Handler::register_handler( '__', function ( $text ) {
			return $text;
		} );
	}

	public function tearDown() {
		\WP_Mock::tearDown();
		Handler::cleanup();
	}

	public function test_setup() {
		\WP_Mock::expectActionAdded( 'init', '\WPPerf\init' );
		\WPPerf\setup();
	}

	public function test_init_registers_post_type() {
		$actual   = array();
		$expected = array(
			'wpperf-test',
			array(
				'public'            => true,
				'labels'            => array(
					'name'               => 'Tests',
					'singular_name'      => 'Test',
					'add_new'            => 'Add New',
					'add_new_item'       => 'Add New Test',
					'edit_item'          => 'Edit Test',
					'new_item'           => 'New Test',
					'view_item'          => 'View Test',
					'search_items'       => 'Search Tests',
					'not_found'          => 'No tests found.',
					'not_found_in_trash' => 'No tests found in Trash.',
					'all_items'          => 'All Tests',
				),
				'show_in_nav_menus' => false,
				'map_meta_caps'     => true,
				'supports'          => array( 'title', 'comments' ),
				'has_archive'       => true,
				'rewrite'           => array(
					'slug'       => 'tests',
					'with_front' => false,
				)
			),
		);
		Handler::register_handler( 'register_post_type', function () use ( &$actual ) {
			$actual = func_get_args();
		} );
		\WPPerf\init();
		$this->assertEquals(
			$expected,
			$actual,
			'register_post_type was not invoked with the expected arguments!'
		);
	}

}

