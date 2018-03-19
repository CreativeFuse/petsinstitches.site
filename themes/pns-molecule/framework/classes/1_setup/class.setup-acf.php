<?php


/**
 * Custom ACF Setup for our Theme
 *
 * ACF is awesome and in order to maximize it's awesomeness, we
 * have created this class, which defines admin options pages and 
 * provides the necessary functions to make use of acf-local-cache.
 * This gets our ACF fields into version control, since they will
 * now save in a json format inside a folder in our theme!
 * Did we mention it also makes ACF run faster??! Huzzahhh!
 *
 * @link       http://creativefuse.org/
 * @since      1.0.0
 *
 * @package    Molecule
 * @subpackage Molecule/setup
 * @author     CreativeFuse <support@creativefuse.org>
 */


class Molecule_ACF_Setup{

	/**
	 * The location of acf-local-cache.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $acf_local_cache   The location within our theme of the acf-local-cache
	 */
	private $acf_local_cache;


	/**
	 * When our class is instantiated, we will run
	 * the required methods to set up ACF to our liking.
	 *
	 * @since  1.0.0
	 */

	public function __construct() {

		$this->create_options_pages();
		$this->set_local_cache_location();
		$this->configure_local_cache();

		add_action('acf/init', array( $this, 'remove_auto_p'));

	}


	/**
	 * Create global ACF Options pages.
	 *
	 * Define additional options pages and options sub-pages as you see fit ;)
	 *
	 * @since  1.0.0
	 */


	private function create_options_pages(){

		/**
		 * Add a general Site Options Page
		 *
		 * This page can be accessed by anyone with edit_posts capabilities
		 *
		 * @since  1.0.0
		 */

		acf_add_options_page([
			'page_title' 	=> 'Site Options',
			'menu_title' 	=> 'Site Options',
			'menu_slug' 	=> 'custom-site-settings',
			'capability' 	=> 'edit_posts',
			'redirect' 		=> false,
		]);

	}

	/**
	 * Set the Location of the ACF local cache
	 *
	 * @since  1.0.0
	 */

	private function set_local_cache_location(){
		$this->acf_local_cache  = get_template_directory() . '/acf-local-cache';
	}

	/**
	 * This method simply runs the filters required to configure our
	 * ACF local cache.
	 *
	 * @since  1.0.0
	 */

	private function configure_local_cache(){
		add_filter('acf/settings/load_json', array( $this, 'json_load_point') );
		add_filter('acf/settings/save_json', array( $this, 'json_save_point') );
	}

	/**
	 * Sets the local path to load ACF options from
	 *
	 * @since  1.0.0
	 */

	public function json_load_point( $paths ){

		// remove original path
		unset($paths[0]);

		// append new path with defined acf-local-cache lcoation
		$paths[] = $this->acf_local_cache;

		// return the new path
		return $paths;

	}

	/**
	 * Sets the local path to save ACF options to
	 *
	 * @since  1.0.0
	 */

	public function json_save_point( $point ){
		
		// update path with the constant
		$path = $this->acf_local_cache;

		// return the new path
		return $path;
	}


	/**
	 *  Remove The Auto Paragraphs from ACF and WP WYSIWYG Editor
	 *
	 * @since  1.0.0
	 *
	 * IMPORTANT NOTE - This was disabled in order to have better control over where an how the 
	 * Auto P tags were being applied. We needed them some places because we needed content and breaks to behave naturally.
	 */

	public function remove_auto_p(){

		//remove_filter ('acf_the_content', 'wpautop');

	}


}