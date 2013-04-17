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
				'name'               => _x( 'Tests', 'Post type general name', 'wpperf' ),
				'singular_name'      => _x( 'Test', 'Post type singular name', 'wpperf' ),
				'add_new'            => _x( 'Add New', 'test', 'wpperf' ),
				'add_new_item'       => __( 'Add New Test', 'wpperf' ),
				'edit_item'          => __( 'Edit Test', 'wpperf' ),
				'new_item'           => __( 'New Test', 'wpperf' ),
				'view_item'          => __( 'View Test', 'wpperf' ),
				'search_items'       => __( 'Search Tests', 'wpperf' ),
				'not_found'          => __( 'No tests found.', 'wpperf' ),
				'not_found_in_trash' => __( 'No tests found in Trash.', 'wpperf' ),
				'all_items'          => __( 'All Tests', 'wpperf' ),
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

