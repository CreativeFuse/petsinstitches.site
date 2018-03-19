
<?php
/**
 * Template • Getting Started
 *
 * The template file to render all parts of the 
 * Getting Started Page
 */

// Intro Section after hero image
Molecule_Router::render( 'page/request-appointment', '_request-appointment', 'intro');

Molecule_Router::render( 'page/request-appointment', '_request-appointment', 'form');