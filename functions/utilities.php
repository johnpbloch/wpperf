<?php

namespace WPPerf;

/**
 * Prepends the WPPerf namespace to the front of function names
 *
 * @param string $function The function to be namespaced
 *
 * @return string The namespaced callback
 */
function n( $function ) {
	$function = ltrim( $function, '\\' );
	return '\WPPerf\\' . $function;
}
