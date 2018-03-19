<?php

/**
 * This class contains methods that output information & Content for
 * the front end of the site.
 * 
 *
 *
 * @link       http://creativefuse.org/
 * @since      1.0.0
 *
 * @package    Molecule
 * @subpackage Molecule/workers
 * @author     CreativeFuse <support@creativefuse.org>
 */

class Molecule_Display {

	// Do nothing when class is instantiated
	public function __construct(){

	}

	/**
	 * Get and return the page title to use in our theme.
	 * 
	 * @access public
	 * @return string 	a lowercased, hyphenated version of the current page's page title
	 * 
	 * @since  1.0.0
	 */
	
	public static function page_title( $echo = true ){

		// Get the page title
		$current_page_title = strtolower ( get_the_title() );

		$replace = array( ' ', '_' );
		$with = '-';

		//Replace spaces with hyphens
		$title = str_replace( $replace, $with, $current_page_title );

		//Sanitize
		$title = esc_attr( $title );

		if( $echo == true ){

			echo $title;

		} else {

			return $title;
		}

	}


	/**
	 * Get a useable version of the Current Post Type from the post object
	 *
	 * @access public
	 * @return		string 		lower case name of post type with space separated by hyphens
	 * 
	 * @since  1.0.0
	 */

	public static function post_type_name( $echo = true ){

		// useable outside of the loop
		global $post;

		$current_post_type = $post->post_type;

		$replace = '_';
		$with = '-';

		// Replace underscores with hyphens
		$post_type_name = str_replace( $replace, $with, $current_post_type );

		// sanitize
		$post_type_name = esc_attr( $post_type_name );

		if( $echo == true ){

			echo $post_type_name;

		} else {

			return $post_type_name;

		}

			
	}


	/**
	 * Get a useable version of the Current Post Type from the post object
	 *
	 * @access public
	 * @return		string 		lower case name of post type with space separated by hyphens
	 * 
	 * @since  1.0.0
	 */

	public static function term_name( $echo = true ){

		// useable outside of the loop
		global $post;

		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );


		// Replace underscores with hyphens
		$term = $term->slug;

		// sanitize
		$term = esc_attr( $term );

		if( $echo == true ){

			echo $term;

		} else {

			return $term;

		}

	
	}


	/**
	 * Always output the current year!
	 * 
	 * @access public
	 *
	 * @author CSS Tricks          
	 * @since 1.0.0
	 */

	public static function copyright_year($year = 'auto'){

		if(intval($year) == 'auto'){

			$year = date('Y');

		}

		if(intval($year) == date('Y')){

			$copy_year = intval($year);

		}

		if(intval($year) < date('Y')){

			$copy_year =  intval($year) . ' - ' . date('Y');

		}

		if(intval($year) > date('Y')){

			$copy_year = date('Y');

		}

		return $copy_year;

	}


	/**
	 * Build the site Copyright
	 * 
	 * @access public
	 *
	 * @author CSS Tricks          
	 * @since 1.0.0
	 */

	public static function copyright( $link_designer = true ){

		$designer = 'Website Design by <a class="c-copyright__link u-color--blue-l" href="http://creativefuse.org" target="_blank">CreativeFuse</a>.';

		if( $link_designer == false ){

			$designer = '';
		}

		$copyright = '&copy; ';

		$copyright .= Molecule_Display::copyright_year() . ' ';

		$copyright .= get_option('blogname') . '.';

		$copyright .= ' All Rights Reserved. ';

		$copyright .= $designer;

		echo wp_kses_post( $copyright );
	}


	/**
	 * Build a function to handle the output of svg icons acros the site
	 *
	 * This integrates tightly with our GULP build process for SVG Icons
	 *
	 * @access public
	 * 
	 * @param string $name the name of the icon
	 * @param sring $class a custom class entered by the user
	 *
	 * @since 1.0.0
	 */

	public static function svg( $name, $class = '' ){

		$sprite = molecule()->get_setting('svg_path');

		// A custom class
        if( $class ){
            $class = 'c-icon--' . $class;
        }


        $svg = '<svg class="c-icon c-icon--'.$name.' '.esc_attr( $class ).'" xmlns=http://www.w3.org/2000/svg role="img" >';
           	$svg .= '<use xlink:href="'.$sprite.'#icon--' . $name .'"></use>';
        $svg .= '</svg>';

        echo $svg;

	}


	// Placeholder for service notes

}