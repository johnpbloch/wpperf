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
 */
function init() {

}

