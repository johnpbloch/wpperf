<?php

namespace WPPerf;

/**
 * Sets up core functionality
 *
 * @uses add_action( 'init', '\WPPerf\init' )
 */
function setup() {
	add_action( 'init', n( 'init' ) );
}

/**
 * Initializes the plugin's core components
 *
 * @uses register_post_type()
 * @uses __()
 * @uses _x()
 */
function init() {
	register_post_type(
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
		)
	);
}

