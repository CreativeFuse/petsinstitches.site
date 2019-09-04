<?php
namespace CreativeFuse\PetsInStitches\Toolkit;

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

        // Cache
		require_once ( __DIR__ . '/cache/i-cache.php' );
        require_once ( __DIR__ . '/cache/class-cache.php' );

        // View
		require_once ( __DIR__ . '/view/i-view.php' );
        require_once ( __DIR__ . '/view/class-view.php' );
        require_once ( __DIR__ . '/view/class-view-fragment.php' );

	}

}