<?php
/**
 * Template • Post Op Pages
 *
 * The template file to render all parts of the 
 * Post Operative Pages
 */


// Choose your pet
Molecule_Router::render( 'page/post-op', '_post-op', 'choose-pet');

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');