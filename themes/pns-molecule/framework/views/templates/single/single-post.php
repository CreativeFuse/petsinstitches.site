<?php
use CreativeFuse\PetsInStitches\Blog\Blog;

if( have_posts() ){

	while( have_posts() ){

		the_post();

		$blog = new Blog( get_the_id() );

		Molecule_Router::render( 'post/post', '_post-single', 'header' );
		Molecule_Router::render( 'post/post', '_post-single', 'body' );

		echo $blog->display_related_posts();

	}

	// Request an Appointment
	Molecule_Router::render( 'object/cta', '_request', 'appointment');

}
