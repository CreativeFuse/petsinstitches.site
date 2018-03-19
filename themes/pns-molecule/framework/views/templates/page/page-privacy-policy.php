
<?php
/**
 * Template • Privacy Policy
 *
 * The template file to render all parts of the 
 * Privacy Policy
 */

// Intro Section after hero image
Molecule_Router::render( 'page/privacy-policy', '_privacy-policy', 'intro');

// Main Section
Molecule_Router::render( 'page/privacy-policy', '_privacy-policy', 'section');