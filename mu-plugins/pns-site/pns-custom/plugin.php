<?php
/**
 * Plugin Handler
 *
 * @package      CreativeFuse\PetsInStitches
 * @since        0.0.1
 * @author       nvwd
 * @license      GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Custom;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

function enqueue_assets() {
	// will be removed if not needed
}

function autoload() {
	// array of relative file names to be loaded
	$files = array(
		'helpers/helpers.php',
		'faq/module.php',
		'partners/module.php',
		'post-op-content/module.php',
		'services/module.php',
		'testimonials/module.php',
		'shared_taxonomies/helper.php',
	);

	foreach ( $files AS $file ) {
		include( __DIR__ . '/src/' . $file );
	}
}

autoload();