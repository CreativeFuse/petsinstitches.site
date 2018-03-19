<?php
/**
 * Template • Archive Testimonials
 *
 * The template file to render all parts of the 
 * Testimonials Archive
 */


// Tabbed navigation for our testimonials
Molecule_Router::render( 'post/testimonials', '_testimonial', 'nav');

// The actual ooutput of all testimonials
Molecule_Router::render( 'post/testimonials', '_testimonial', 'list');

// Pagination
Molecule_Router::render( 'component', '_post', 'pagination');