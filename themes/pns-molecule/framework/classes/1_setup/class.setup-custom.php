<?php

/**
 * Custom WP Setup.
 *
 * Add functionality, remove or filter un-needed or unsecure outputs, and just make WP
 * even more awesome than it already is. 
 *
 * @link       http://creativefuse.org/
 * @since      1.0.0
 *
 * @package    Molecule
 * @subpackage Molecule/setup
 * @author     CreativeFuse <support@creativefuse.org>
 */

class Molecule_Custom_Setup{

	/**
	 * When our class is instantiated, we will run
	 * all of our setup methods via WP hooks.
	 *
	 * @since  1.0.0
	 */

	public function __construct(){

		// General
		add_action(	'init', 				array( $this, 'set_timezone'), 1);
		add_action( 'after_setup_theme',	array( $this, 'allow_shortcodes_in_widgets' ));
		add_action( 'after_setup_theme', 	array( $this, 'gform_label_visibility' ));
		add_action( '_admin_menu',      	array( $this, 'remove_theme_editor_menu' ), 1 );

		// Security
		add_filter( 'the_generator',   		array( $this, 'remove_version_from_wp_head' ) );
		add_filter( 'login_errors',    		array( $this, 'change_default_login_error_message' ) );

		// Clean
		$this->remove_emoji_support();
		$this->clean_wp_head();

		// Tiny MCE
		add_filter('mce_buttons_2', array( $this, 'enable_tiny_mce_formats') );
		add_filter('tiny_mce_before_init', array( $this, 'insert_text_link_tiny_mce_format') );

		// Remove Auto P
		add_action( 'the_post', array( $this, 'remove_auto_p_support' ) );

		// Modify the escerpt
		add_filter( 'excerpt_more', array( $this, 'modify_read_more') );
	}


	/**
	 * Hard set the default timezone.
	 * 
	 * For some reason, even when set in WP settings,
	 * timezones are still set to the server and not the locale of the business.
	 * If we have any date or time based functions, we need the timezone to reflect
	 * the timzone of the business this website is being built for!
	 *
	 * @since  1.0.0
	 */

	public function set_timezone(){

		date_default_timezone_set( molecule()->get_setting( 'timezone' ) );

	}

	/**
	 * Allow shortcodes to be used in Widgets. 
	 * This is disabled by default! BOOOO!!!
	 *
	 * @since  1.0.0
	 */

	public function allow_shortcodes_in_widgets(){

		add_filter( 'widget_text', 'do_shortcode' );

	}

	/**
	 * Add an option to Gravity Forms that allows
	 * the user to hide field labels on a per-fielld basis.
	 *
	 * @since  1.0.0
	 */

	public function  gform_label_visibility(){


		add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

	}


	/**
	 * Remove the theme editor menu from the
	 * wp-admin menu.  We really don't need
	 * it for any reason ever.
	 *
	 * @since  1.0.0
	 */

    public function remove_theme_editor_menu() {

      remove_action('admin_menu', '_add_themes_utility_last', 101);

    }


    /**
     * Remove Wordpress Version from WP site Head. 
     * Showing WP version is a security risk.
     *
     * @since  1.0.0
     */

    public function remove_version_from_wp_head() {

        return '';

    }	

    /**
     * Change Default WP Login Error
     *
     * Uses a filter to change the login failed error message.
     * Showing the default message can pose a security risk because
     * it gives hints about why the login was incorrect.
     *
     * 
     * @return string Message to display on login error.
     * @since 1.0.0
     */

    public function change_default_login_error_message(){

        return 'LOGIN FAILED';

    }

    /**
	 * REMOVE Support for WP-EMOJIS
	 * because the script force loads in header...boooooooo
	 *
	 * @since  1.0.0
	 */

	public function remove_emoji_support(){

		

        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );

    }
    
    /**
     * Clean up Wordpress Head by removing 
     * un-needed sctyles, scripts, and support.
     *
     *
     * @since 1.0.0
     */
    
    public function clean_wp_head() {

    	/**
	     * Remove RSD Link from WP-Head
	     *
	     * If you need to add integration with services like Flickr...add this back.
	     *
	     * @since 1.0
	     */
        
        remove_action('wp_head', 'rsd_link');
        
        /**
         * Remove Windows Live Writer
         *
         * @since  1.0.0
         */

        remove_action('wp_head', 'wlwmanifest_link');
        
        
        /**
         * Remove Post Relational Links
         *
         * @since  1.0.0
         */
        
        remove_action( 'wp_head', 'start_post_rel_link' );
        remove_action( 'wp_head', 'index_rel_link' );
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );


	}


	/**
	 * Enable Custom Formats in TinyMCE Editor in Wordpress
	 *
	 * @since  1.0.0
	 */
	
	public function enable_tiny_mce_formats($buttons) {

    	array_unshift($buttons, 'styleselect');
    	return $buttons;
    
	}

	/**
	 * Add Custom Text Link Format
	 */

	function insert_text_link_tiny_mce_format($init_array) {

		// Define the style_formats array

	    $style_formats = array(
	        // Each array child is a format with it's own settings
	        array(
	        	
	            'title' => 'Pets in Stitches Link',
	            'inline' => 'span',
	            'classes' => 'c-text-link'
	        ),
	    );
	    
	    // Insert the array, JSON ENCODED, into 'style_formats'
	    $init_array['style_formats'] = json_encode($style_formats);
	    return $init_array;
	}

	/**
	 * Remove Default WP Auto P
	 */

	public function remove_auto_p_support(){
		
		if( ! is_single() ){

			remove_filter ('the_content', 'wpautop');
			remove_filter ('the_excerpt', 'wpautop');

		}

	}


	/**
	 * Modify the default Read More Functionality in Wordpress
	 */

	public function modify_read_more(){

		return '<span class="c-card--post__body__more e-p--common c-text-link"> ...Read More</span>';

	}

}