<?php

/**
 * This class handles all of the enqueues for the theme.
 *
 * @link       http://creativefuse.org/
 * @since      1.0.0
 *
 * @package    Molecule
 * @subpackage Molecule/site
 * @author     CreativeFuse <support@creativefuse.org>
 */

class Molecule_Enqueue {


	/**
	 * When our class is instantiated, we will run
	 * all of our enqueues.
	 *
	 * @since  1.0.0
	 */

	public function __construct(){

		add_action( 'wp_enqueue_scripts', array( $this, 'load_fonts' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_script_bundle' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_lightcase' ), 2 );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_isotope' ), 2);
	}

	/**
	 * Load all of the fonts for our site when we are not on admin pages
	 *
	 * @since  1.0.0
	 */

	public function load_fonts(){

		$base = 'https://fonts.googleapis.com/css?family=';

		$families = 'Delius:400|Assistant:300,400,600,700';

		$full_font_request_url = $base . $families;

		$fonts = [

			'handle' 			=> 'app-fonts',
			'src'				=> $full_font_request_url,
			'dependencies'		=> null,
			'version'			=> null,
			'media'				=> 'all',

		];

		// Don't enqueue if we don't define font families to load
		if( ! $families )
			return;

		wp_register_style( $fonts['handle'], $fonts['src'], $fonts['dependencies'], $fonts['version'], $fonts['media'] );
		wp_enqueue_style( $fonts['handle'] );

	}


	/**
	 * Load the Core Script Bundle on the site
	 *
	 * @since  1.0.0
	 */

	public function load_script_bundle(){

		wp_register_script( 'molecule-script-bundle', molecule()->get_setting( 'asset_uri' ) . 'dist/js/core.bundle.min.js', array( 'jquery' ), molecule()->get_setting( 'version' ) , true );

		// Load if not in admin area
		if( ! is_admin() ){

			wp_enqueue_script( 'molecule-script-bundle' );

		}

	}


	/**
	 * Load the Core Script Bundle on the site
	 *
	 * @since  1.0.0
	 */

	public function load_isotope(){

		wp_register_script( 'molecule-isotope', molecule()->get_setting( 'asset_uri' ) . 'dist/js/pns-isotope.min.js', array( 'jquery' ), molecule()->get_setting( 'version' ) , true );

		// Load if not in admin area
		if( ! is_admin() && is_post_type_archive( 'partners' ) ){

			wp_enqueue_script( 'molecule-isotope' );

		}

	}


	/**
	 * Load the Lightcase
	 *
	 * @since  1.0.0
	 */

	public function load_lightcase(){

		// Bring in our post global
		global $post;

		wp_register_script( 'molecule-lightcase', molecule()->get_setting( 'asset_uri' ) . 'dist/js/pns-lightcase.min.js', array( 'jquery' ), molecule()->get_setting( 'version' ) , true );


		// Build an array for our Post Op Parent Page ID
		$post_op_parent_id = array(

			'152' 	=> 'dev',
			'274' 	=> 'live'
		);

		// Load if not in admin area and if we are on a post parent page

		if( ! is_admin() && array_key_exists( $post->post_parent, $post_op_parent_id ) ){

			wp_enqueue_script( 'molecule-lightcase' );

		}

		// Load if not in admin and if we are on the stray cats page

		if( ! is_admin() && is_page( 'stray-cats' ) ){

			wp_enqueue_script( 'molecule-lightcase' );

		}

	}



}