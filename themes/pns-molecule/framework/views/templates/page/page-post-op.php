<?php
/**
 * Template • Post Op Pages
 *
 * The template file to render all parts of the 
 * Post Operative Pages
 */

// Tabbed navigation and content for our Post Operative Pages
Molecule_Router::render( 'page/post-op', '_post-op', 'tabs');


// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');