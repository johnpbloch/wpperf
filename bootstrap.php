<?php

namespace WPPerf;

define( 'DIR', WP_PLUGIN_DIR . '/' . basename( __DIR__ ) );
define( 'URL', WP_PLUGIN_URL . '/' . basename( __DIR__ ) );

require_once DIR . '/functions/utilities.php';
require_once DIR . '/functions/core.php';

add_action( 'plugins_loaded', n( 'setup' ) );
