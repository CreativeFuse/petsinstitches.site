<?php

/**
 * Theme Setup functionality.
 *
 * Set localization, register theme menus, add_theme,support,
 * load default stylesheets and scripts.
 *
 * @link       http://creativefuse.org/
 * @since      1.0.0
 *
 * @package    Molecule
 * @subpackage Molecule/setup
 * @author     CreativeFuse <support@creativefuse.org>
 */

class Molecule_Theme_Setup{


	/**
	 * When our class is instantiated, we will run
	 * all of our setup methods via WP hooks.
	 *
	 * @since  1.0.0
	 */

	public function __construct(){

		add_action( 'after_setup_theme', array( $this, 'set_locale' ));
		add_action( 'after_setup_theme', array( $this, 'register_menus' ));
		add_action( 'after_setup_theme', array( $this, 'add_theme_support' ));

		add_action( 'wp_enqueue_scripts', array( $this, 'load_stylesheet' ), 10 );

	}

	/**
	 * Define and load our theme text domain / localization.
	 *
	 * Translations can be added to the /framework/lang/ directory.
	 *
	 * @since  1.0.0
	 */

	public function set_locale(){

		load_theme_textdomain( 'molecule', molecule()->get_setting('framework_path') . 'lang' );

	}

	/**
	 * Register all desired WP Menus
	 *
	 * @since  1.0.0
	 */

	public function register_menus(){


		register_nav_menus( array(
			'primary'    => __( 'Primary Menu', 'molecule' )
		) );

	}

	/**
	 * Define items to add theme support for.
	 *
	 * @since  1.0.0
	 */

	public function add_theme_support(){

		add_theme_support( 'post-thumbnails' );

	}

	/**
	 * Register & Enqueue style.css
	 *
	 * @uses a setting defined in Molecule for cachebusting with filetime versioning.
	 *
	 * @since  1.0.0
	 */

	public function load_stylesheet(){

		$stylesheet = [

			'handle' 			=> 'app-styles',
			'src'				=> Manifest::get_asset( 'app.css' ),
			'dependencies'		=> null,
			'version'			=> null,
			'media'				=> 'all',

		];

		wp_register_style( $stylesheet['handle'], $stylesheet['src'], $stylesheet['dependencies'], $stylesheet['version'], $stylesheet['media'] );
		wp_enqueue_style( $stylesheet['handle'] );


	}

}