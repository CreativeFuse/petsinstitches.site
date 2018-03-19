<?php
/**
 * INDEX.PHP
 *
 * The Default file for WP to use to display content
 * @since 1.0.0
 * @package wordpress
 */


get_header();

/**
 * If the content is not found and we are on a 404 page
 */

if( is_404() ){


	Molecule_Router::render_template( 'page', '404' );	


} elseif( have_posts() ){
	// Being the Wordpress Loop

	/**
	 * Use this action hook to output anything you want
	 * before the content element opens.
	 */
		 
	do_action( 'molecule_before_content' );

	?>

	<div id="#content" class="o-content o-content--<?php Molecule_Display::post_type_name(); ?> o-content--<?php Molecule_Display::page_title(); ?>">


			<?php

				/**
				 * Attempt to fetch the appropriate template
				 * from our custom template library which exists
				 * at framework/views/template
				 *
				 */

				Molecule_Router::load_template();
	
		/**
		 *  Use this action hook to output anything you want
		 *  after the_content() is done with its output and
		 *  before the_content element ends
		 */

		do_action( 'molecule_before_content_ends' );

		?>

	</div>


	<?php

	/**
	 *  Use this action hook to output anything you want
	 *  after the_content() is done with its output and
	 *  before the_content element ends
	 */

	do_action( 'molecule_after_content' );


} else {

	
	
}

get_footer();