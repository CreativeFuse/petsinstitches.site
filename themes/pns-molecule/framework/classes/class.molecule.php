<?php

/**
 * The file that defines the core theme class
 *
 * @link       http://creativefuse.org/
 * @since      1.0.0
 *
 * @package    Molecule
 * @subpackage Molecule/classes
 */


/**
 * The core theme class.
 *
 * This is used to define settings, load dependencies, and instantiate
 * all other classes.
 *
 *
 * @since      1.0.0
 * @package    Molecule
 * @subpackage Molecule/classes
 * @author     CreativeFuse <support@creativefuse.org>
 */

class Molecule {

	/**
	 * The unique identifier of this theme.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $theme_name    The string used to uniquely identify this theme.
	 */
	protected $theme_name = 'molecule';

	/**
	 * The current version of the theme.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the theme.
	 */

	protected $version = '1.0.1';



	/**
	 * Do nothing when the class is instantiated. Instead, we are using
	 * the initalize() method to kick everything off. This method is called from
	 * functions.php
	 *
	 * @since    1.0.0
	 */
	
	public function __construct() {

	}


	/**
	 * The method that kicks off the whole shbang! When this metho runs, it does the following:
	 *
	 * 1. Define settings for our theme.
	 * 2. Loads all deondencies
	 * 3. Instantiates other necessary classes.
	 * 
	 * @since  1.0.0
	 */

	public function initialize(){

			
		/**
		 * Our Array of theme settings to be used across this project.
		 *
		 * We are using these settings in place of constant definitions since
		 * constant definitions in classes can be a bit finicky.
		 */

		$this->settings = array(

			// basic
			'theme_name'			=> $this->theme_name,
			'version'				=> $this->version,


			// define paths
			'framework_path'		=> get_template_directory() . '/framework/',
			'class_path'			=> get_template_directory() . '/framework/classes/',
			'asset_path'			=> get_template_directory() . '/framework/assets/',
		    'asset_uri'				=> get_template_directory_uri() . '/framework/assets/',
		    'img_path'				=> get_template_directory_uri() . '/framework/assets/dist/imgs/',
		    'svg_path'				=> get_template_directory_uri() . '/framework/assets/dist/svgs/icons.svg',
		    'svg_dir'				=> get_template_directory_uri() . '/framework/assets/dist/svgs/',
			'view_partial_path'		=> '/framework/views/partials/',
			'view_template_path'	=> '/framework/views/templates/',
			
			//utility
			'timezone'				=> 'America/New_York',
			'stylesheet_cachebust'	=> filemtime( get_stylesheet_directory() . '/style.css' ),

		);

		
		// Load all of the things!
		$this->load_dependencies();

		// Run all of the things
		$this->instantiate();

	}


	/**
	 * Load the required dependencies for this theme.
	 *
	 * Include the following files that set up our theme:
	 *
	 * - Molecule_Theme_Setup. 		Sets up default theme functionality.
	 * - Molecule_Custom_Setup. 	Customize WP functionality to make it better and more secure.
	 * - Molecule_ACF_Setup.	 	Set up theme integration with ACF.
	 *
	 *
	 * Include the following files that deal with routing and content display:
	 *
	 * - Molecule_Router. 	Retreives and renders appropriate theme views.
	 * - Molecule_Display. 	Methods that render a fixed result with no parameters required.
	 *
	 * Then include all site files that add the needed functionality to the remainder of our project
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	
	private function load_dependencies() {

		// setup classes
		require_once $this->settings['class_path'] . '1_setup/class.setup-theme.php';
		require_once $this->settings['class_path'] . '1_setup/class.setup-custom.php';

		//Only load if Advanced Custom Fields is ACTIVATED
		if ( class_exists( 'acf' ) ){
			require_once $this->settings['class_path'] . '1_setup/class.setup-acf.php';
		}

		// worker classes
		require_once $this->settings['class_path'] . '2_workers/class.router.php';
		require_once $this->settings['class_path'] . '2_workers/class.display.php';


		/**
		 * site classes
		 * 
		 * Any additional classes created for this theme should be added to
		 * the classes/3_site folder and required here.
		 *
		 * @since  1.0.0
		 */

		require_once $this->settings['class_path'] . '3_site/class.enqueue.php';
		require_once $this->settings['class_path'] . '3_site/class.query.php';
		require_once $this->settings['class_path'] . '3_site/class.mega-menu.php';



	}


	/**
	 * Instantiate our setup and site classes.
	 *
	 * Our worker classes are not included because their methods are
	 * static. They do nothing unless a method is called directly.
	 *
	 * @since 1.0.0
	 */

	private function instantiate() {

		// 1_setup
		$theme_setup    = new Molecule_Theme_Setup();
		$custom_setup   = new Molecule_Custom_Setup();
		$acf_setup      = new Molecule_ACF_Setup();

		/**
		 * 3_site
		 * 
		 * Any additional classes created for this theme should be added to
		 * the classes/3_site folder and instantiated here if neeed.
		 *
		 * @since  1.0.0
		 */

		$enqueue		= new Molecule_Enqueue();
		$query			= new Molecule_Query();
		$mega_menu		= new Molecule_Mega_Menu();

	}

   /**
	*
	* Define a method to return a value from the settings array
	* found in the molecule object.
	*
	* Since our molecule object is instantiated via a function in
	* functions.php, we can call the get_setting method in any class
	* like this: molecule()->get_setting( 'some_value' )
	*
	* @since	1.0.0
	*
	* @param	$name (string) the setting name to return
	* @param	$value (mixed) default value
	* @return	$value
	*/

	function get_setting( $name, $value = null ) {

		// check to see if the setting is defined
		if( isset($this->settings[ $name ]) ) {

			// If it is, let's get it!
			$value = $this->settings[ $name ];

		}

		// return the setting value
		return $value;

	}

}