<?php
/**
 * Template • Shortcode Testimonials
 *
 * The template file to render all parts of the
 * Testimonials Shortcode
 */

// The actual ooutput of all testimonials
Molecule_Router::render( 'post/testimonials', '_testimonial-shortcode', 'list', $testimonials );
