<?php
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

namespace CFi\Module\GTM;


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die( 'You cannot access this file!' );
}



class Bootstrap{

	// Here we go.
	public function launch(){

		require_once ( __DIR__ . '/src/class-gtm.php' );

	}

}