
<?php
/**
 * Template • About
 *
 * The template file to render all parts of the 
 * Getting About page
 */


// Intro for about page
Molecule_Router::render( 'page/about', '_about', 'intro' );

// The Staff
Molecule_Router::render( 'page/about', '_about', 'staff' );

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');