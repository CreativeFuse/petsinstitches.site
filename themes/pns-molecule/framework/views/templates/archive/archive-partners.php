<?php
/**
 * Template • Archive Partners
 *
 * The template file to render all parts of the 
 * Testimonials Archive
 */


// Tabbed navigation for our testimonials
Molecule_Router::render( 'post/partners', '_partner', 'nav');

// The actual ooutput of all testimonials
Molecule_Router::render( 'post/partners', '_partner', 'grid');