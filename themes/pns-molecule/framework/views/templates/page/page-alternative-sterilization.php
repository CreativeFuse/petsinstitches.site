
<?php
/**
 * Template • Alternative Sterilization
 *
 * The template file to render all parts of the
 * Getting Alternative Sterilization
 */

// Intro Section after hero image
Molecule_Router::render( 'page/alt-sterilization', '_alt-sterilization', 'intro');

// Low Price Guarantee
Molecule_Router::render( 'page/alt-sterilization', '_alt-sterilization', 'low-price');

// Main Section, list of different surgeries
Molecule_Router::render( 'page/alt-sterilization', '_alt-sterilization', 'section');

// Main Section, list of different surgeries
Molecule_Router::render( 'page/alt-sterilization', '_alt-sterilization', 'comparison');

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');
