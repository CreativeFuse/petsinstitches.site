<?php
/**
 * Template • Forms Pages
 *
 * The template file to render all parts of the 
 * Forms Pages
 */

// Tabbed navigation and content for our Forms Pages
// Molecule_Router::render( 'page/forms', '_forms', 'tabs');
Molecule_Router::render( 'page/forms', '_forms', 'section__pet' );

// Request an Appointment
// Molecule_Router::render( 'object/cta', '_request', 'appointment');