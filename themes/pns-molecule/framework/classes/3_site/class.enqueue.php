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
		add_action( 'wp_enqueue_scripts', array( $this, 'load_app_scripts' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_partners_scripts' ), 2 );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_lightbox_scripts' ), 2);
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

	public function load_app_scripts(){

		$script = [

			'handle' 			=> 'app-script',
			'src'				=> Manifest::get_asset( 'app.js' ),
			'dependencies'		=> ['jquery'],
			'version'			=> null,
			'load_in_footer'	=> true,

		];

		if( ! is_admin() ){

			wp_register_script( $script['handle'], $script['src'], $script['dependencies'], $script['version'], $script['load_in_footer'] );
			wp_enqueue_script( $script['handle'] );

		}

	}


	/**
	 * Load the Core Script Bundle on the site
	 *
	 * @since  1.0.0
	 */

	public function load_partners_scripts(){

		$script = [

			'handle' 			=> 'partners-script',
			'src'				=> Manifest::get_asset( 'partners.js' ),
			'dependencies'		=> ['jquery'],
			'version'			=> null,
			'load_in_footer'	=> true,

		];


		// Load if not in admin area
		if( ! is_admin() && is_post_type_archive( 'partners' ) ){

			wp_register_script( $script['handle'], $script['src'], $script['dependencies'], $script['version'], $script['load_in_footer'] );
			wp_enqueue_script( $script['handle'] );

		}

	}


	/**
	 * Load the Lightcase
	 *
	 * @since  1.0.0
	 */

	public function load_lightbox_scripts(){

		// Bring in our post global
		global $post;


		// Build an array for our Post Op Parent Page ID
		$post_op_parent_id = array(

			'152' 	=> 'dev',
			'274' 	=> 'live'
		);

		$script = [

			'handle' 			=> 'lightbox-script',
			'src'				=> Manifest::get_asset( 'lightbox.js' ),
			'dependencies'		=> ['jquery'],
			'version'			=> null,
			'load_in_footer'	=> true,

		];

		// Load if not in admin area and if we are on a post parent page

		if( ! is_admin() && array_key_exists( $post->post_parent, $post_op_parent_id ) ){

			wp_register_script( $script['handle'], $script['src'], $script['dependencies'], $script['version'], $script['load_in_footer'] );
			wp_enqueue_script( $script['handle'] );

		}

		// Load if not in admin and if we are on the stray cats page

		if( ! is_admin() && is_page( 'stray-cats' ) || ! is_admin() && is_page( 'take-a-tour' )){

			wp_register_script( $script['handle'], $script['src'], $script['dependencies'], $script['version'], $script['load_in_footer'] );
			wp_enqueue_script( $script['handle'] );

		}

	}



}