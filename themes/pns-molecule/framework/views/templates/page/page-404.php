<?php
/**
 * Template • 404 Page
 *
 * The template file to render all parts of the 
 * 404 Page
 */

// Intro Section after hero image
Molecule_Router::render( 'page/404', '_404', 'section');

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');