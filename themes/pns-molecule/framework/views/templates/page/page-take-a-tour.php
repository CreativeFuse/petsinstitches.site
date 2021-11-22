
<?php
/**
 * Template • Take a tour
 *
 * The template file to render all parts of the 
 * Take a tour Page
 */

// Intro Section after hero image
Molecule_Router::render( 'page/take-a-tour', '_take-a-tour', 'intro');

// Prior to Your Visit section
Molecule_Router::render( 'page/take-a-tour', '_take-a-tour', 'content');

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');