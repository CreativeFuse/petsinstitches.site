<?php

if( have_posts() ){

	while( have_posts() ){

		the_post();
		
		Molecule_Router::render( 'post/post', '_post-single', 'header' );
		Molecule_Router::render( 'post/post', '_post-single', 'body' );


	}

	// Request an Appointment
	Molecule_Router::render( 'object/cta', '_request', 'appointment');

}