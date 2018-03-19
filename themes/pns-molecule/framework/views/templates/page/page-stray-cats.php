
<?php
/**
 * Template • Stray Cats
 *
 * The template file to render all parts of the 
 * Getting Stray Cats
 */

// Intro Section after hero image
Molecule_Router::render( 'page/stray-cats', '_stray-cats', 'intro');

// Main Section, list of different surgeries
Molecule_Router::render( 'page/stray-cats', '_stray-cats', 'section');

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');