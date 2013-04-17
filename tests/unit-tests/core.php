<?php

namespace WPPerf;

use WP_Mock\Handler;

require_once WPPERF_DIR . '/functions/core.php';

class Core_Tests extends \PHPUnit_Framework_TestCase {

	public function setUp() {
		\WP_Mock::setUp();
		Handler::cleanup();
		Handler::register_handler( '__', function ( $text, $textdomain ) {
			if ( $textdomain !== 'wpperf' ) {
				return $text;
			}
			return "T~($text)~T";
		} );
		Handler::register_handler( '_x', function ( $text, $context, $textdomain ) {
			if ( $textdomain !== 'wpperf' ) {
				return $text;
			}
			return "T~($text):($context)~T";
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
					'name'               => 'T~(Tests):(Post type general name)~T',
					'singular_name'      => 'T~(Test):(Post type singular name)~T',
					'add_new'            => 'T~(Add New):(test)~T',
					'add_new_item'       => 'T~(Add New Test)~T',
					'edit_item'          => 'T~(Edit Test)~T',
					'new_item'           => 'T~(New Test)~T',
					'view_item'          => 'T~(View Test)~T',
					'search_items'       => 'T~(Search Tests)~T',
					'not_found'          => 'T~(No tests found.)~T',
					'not_found_in_trash' => 'T~(No tests found in Trash.)~T',
					'all_items'          => 'T~(All Tests)~T',
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

