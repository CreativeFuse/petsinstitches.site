<?php
namespace CreativeFuse\PetsInStitches\Blog;

/**
 * GTM's Bootstrap File
 *
 * @since  1.0.0
 * @package CFi\Module\GTM
 * @author CreativeFuse
 *
 * A custom module for implementing and customizing
 * Google Tag Manager.
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die( 'You cannot access this file!' );
}

class Bootstrap{

	// Here we go.
	public function launch(){

        // Dependencies
		require_once ( __DIR__ . '/src/class-related-posts.php' );

		// Main Class
		require_once ( __DIR__ . '/src/class-blog.php' );


	}

}