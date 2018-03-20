<?php
/**
 * Plugin Name: Must Use Module Loader
 * Description: A Module Loader written in OPP to load and instantiate all of our MU-Plugins
 * Author: CreativeFuse
 * Author URI: http://creativefuse.org
 * Version: 1.0.0
 *
 * @package      CFi
 * @since        1.0.0
 * @author       CreativeFuse
 * @license      GNU-2.0+
 */

namespace CFi;


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die( 'You cannot access this file!' );
}

/**
 * We have some legacy plugins that are loaded directly via
 * an include below and are not part of the Autoload architecture.
 * Eventually these will get rebuilt and rolled into the system, but
 * for now they are simply going to be included.
 */

// BEGIN LEGACY INCLUDES //
include( 'pns-site/pns-custom.php' );
include( 'pns-custom-seo/pns-custom-seo.php' );
// END LEGACY INCLUDES //



class Autoloader{

	/**
	 * The path to our config file
	 * 
	 * @var string
	 * @since  1.0.0
	 */
	private $config_file_path;

	/**
	 * An Array of all of the modules
	 * to load and instantiate
	 */
	private $config;



	/**
	 * Load our config file
	 *
	 * @since  1.0.0
	 */

	public function load_config(){

		/**
		 * Define our config file path
		 */
		$this->config_file_path = __DIR__ . '/_mu-config/config.php';


		// Build our config array if the config file exists
		if( file_exists( $this->config_file_path ) ){

			$this->config = require_once( $this->config_file_path );

		}


	}

	/**
	 * Get the config file
	 */
	private function get_config( $key = '' ){

		// Locally define our config file
		$_config = $this->config;

		// If we are passing in a key, let's get the value
		if( $key ){

			$_config = $this->config[ $key ];

		}

		return $_config;
	}
 


	/**
	 * Loop through our defined array of 
	 * modules, load them, and insantiate them
	 *
	 * @since 1.0.0
	 */

	private function load_modules(){


		foreach ( $this->get_config('modules') AS $fully_qualified_namespace => $bootstrap_filename ){

			// load the bootstrap file
			require_once( __DIR__ . '/' . $bootstrap_filename );

			// Instantiate the class
			$module = new $fully_qualified_namespace;

			// Launch the module
			$module->launch();

		}

	}


	/**
	 * The method that kicks off all other
	 * methods for the autoloader.
	 *
	 * @since  1.0.0
	 */
	public function run(){


		// Attempt to load our config file
		$this->load_config();


		// If our config file is properly loaded,
		// we can run everything :)

		if( $this->config ){

			// If there is data in the modules array,
			// let's load the modules we defined

			if( $this->get_config('modules') ){

				// load modules
				$this->load_modules();

			}

		}
		

	}


} // End the Autloader class


/**
 * Instantiate & return the one true instance of our
 * MU Plugin Autoloader. We never want to instantiate
 * our autoloader twice!
 *
 * @return OBJECT $autoloader
 * 
 */
function autoloader(){

	global $autoloader;

	if( ! isset( $autoloader ) ){

		$autoloader = new Autoloader;
		$autoloader->run();

	}

	return $autoloader;

}

autoloader();