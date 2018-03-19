<?php
/**
 * Controller for the helpers
 *
 * @package        CreativeFuse\Helpers
 * @since        0.0.1
 * @author        nvwd
 * @license        GNU-2.0+
 */

namespace CreativeFuse\Helpers;

function autoload() {
	$files = array(
		'label-generator.php',
		'post-type.php',
		'taxonomy.php',
		'shortcode.php',
	);

	foreach ( $files AS $file ) {
		include( __DIR__ . '/' . $file );
	}
}

autoload();
