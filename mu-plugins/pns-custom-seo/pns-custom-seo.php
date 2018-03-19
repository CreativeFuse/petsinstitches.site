<?php
/**
 * Plugin Name: PNS • Custom SEO
 * Description:
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

if ( ! defined('PNS_CUSTOM_SEO_DIR') ){
  define( 'PNS_CUSTOM_SEO_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined('PNS_CUSTOM_SEO_INC_DIR') ){
  define( 'PNS_CUSTOM_SEO_INC_DIR', PNS_CUSTOM_SEO_DIR . '/includes' );
}


/**
 * Set up the class main for the plugin
 * @since 1.0.0
 */

if ( ! class_exists( 'PNS_Custom_Seo' ) ){

	class PNS_Custom_Seo{


		function __construct() {

			$this->run();

		}


		/**
		 * Load our module dependencies
		 */
		function run(){

 			require_once ( PNS_CUSTOM_SEO_INC_DIR . '/custom-meta.php' );
 			require_once ( PNS_CUSTOM_SEO_INC_DIR . '/custom-sitemaps.php' );

		}


	}//End PNS_Custom_Seo


	// initialize the entire class
	new PNS_Custom_Seo;


}//end if class exists check