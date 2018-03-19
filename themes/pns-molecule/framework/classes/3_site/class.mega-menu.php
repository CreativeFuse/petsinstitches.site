<?php

/**
 * This class handles the building of this theme's Mega Menu
 *
 * @link       http://creativefuse.org/
 * @since      1.0.0
 *
 * @package    Molecule
 * @subpackage Molecule/site
 * @author     CreativeFuse <support@creativefuse.org>
 *
 * @uses  get_panel to load the appropriate mega menu panel
 * @ref https://www.thewebguild.org/news/coding-a-mega-menu-in-wordpress
 */


class Molecule_Mega_Menu extends Walker_Nav_Menu{


	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $prepend = '';
        $append = '';
        $description = '';

	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	 
	    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	 
	    $classes[] = 'menu-item-' . $item->ID;
	 
	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	 
	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	 
	    $output .= $indent . '<li' . $id . $class_names .'>';
	 
	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

	    // only add our trigger class to items without a mega menu
	    if ( in_array("has-mega", $classes) ) {
	    	$atts['class']  = 'js-trigger-mega';
		}
	    	 
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
	 
	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	        if ( ! empty( $value ) ) {
	            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	            $attributes .= ' ' . $attr . '="' . $value . '"';
	        }
	    }
	 
	    $item_output = $args->before;
	    $item_output .= '<a'. $attributes .'>';
			    $item_output .= $args->link_before .$prepend.apply_filters(  'the_title', $item->title, $item->ID ).$append;
			    $item_output .= $description.$args->link_after;
	    $item_output .= '</a>';
	    $item_output .= $args->after;
	 
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	 
		


	}
 	
 	/**
 	 * The real meat and potatoes of our walker class.
 	 * This loads our mega menu functionality along with the necessary
 	 * menu wrappers if the "has-mega" class is applied to a nav item
 	 * 	  	
 	 */

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {

    			// Get Nav Item Classes
    			$classes = empty( $item->classes ) ? array() : (array) $item->classes;


    			// If the nav item has the "has-mega class"
    			if ( in_array("has-mega", $classes) ) {
    				
    				// Build the Mega Menu mrappers
    				$output .= "<ul class='o-mega'>";
		        		$output .= "<div class='o-mega__panel'>";
		        			$output .= "<div class='o-container o-container--max--mega'>";
						    	
						    	/**
						    	 * If the proper method ixists, we are going to call
						    	 * the method to render the actual panels of the Mega Menu
						    	 */
		        				if( method_exists( 'Molecule_Mega_Menu', 'render_panel' ) ){

									$output .= $this->render_panel( $item->title );

								}

								
							$output .= "</div><!-- END container -->";
			        	$output .= "</div><!-- END mega-menu panel -->";
			        $output .= "</ul><!-- END mega-menu -->";


			    }

 	// Close the List Element

    $output .= "</li>";
 
	}


	/**
	 * A simple method responsible for programatically
	 * rendering the proper Mega Menu panel.
	 * 
	 * @param	string  The title of the item currently being iterated over.
	 * @return	string	The concatenated output to be passed back to the Walker
	 * @uses   	Molecule_Router::render() to render the proper view from framework/views/partials
	 *
	 * @since 1.0.1
	 */

	public function render_panel( $item_title ){


		$output = '';

		$item_title = strtolower( $item_title );

		$output .= Molecule_Router::render( 'object/mega-menu', 'mega', $item_title, $output);

		return $output;


	}



}