<?php
/**
 * Plugin Name: PNS • Analytics Suite
 * Description: This custom plugin for Good Medicine loads in hotjar, Google Analytics, and any other tracking scripts we might need.
 * Author: CreativeFuse
 * Version: 1.0.0
 *
 */

//Die if accessed Directly
if ( ! defined( 'ABSPATH' ) ) {
	die('No scripts kiddies please');
}

/**
* Define Constant Directories
* @note used for requires and includes
*/

if ( ! defined('PNS_ANALYTICS_DIR') ){
  define( 'PNS_ANALYTICS_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined('PNS_ANALYTICS_INC_DIR') ){
  define( 'PNS_ANALYTICS_INC_DIR', PNS_ANALYTICS_DIR . '/includes' );
}


/**
 * Set up the class main for the plugin
 * @since 1.0.0
 */

if ( ! class_exists( 'PNS_Analytics_Stack' ) ){

	class PNS_Analytics_Stack{


		function __construct() {

			$this->load();

		}


		/**
		 * Load Analytics into appropriate Hook
		 *
		 */
		function load(){

 			add_action( 'wp_head', array( $this, 'load_google_analytics' ), 1 );

		}

		/**
		 * Include Google Analytics
		 *
		 */
		function load_google_analytics(){

			require_once ( PNS_ANALYTICS_INC_DIR . '/google-analytics.php' );

		}
		
	}//End WOLF_Analytics_Stack


	// initialize the entire class
	new PNS_Analytics_Stack;


}//end if class exists check