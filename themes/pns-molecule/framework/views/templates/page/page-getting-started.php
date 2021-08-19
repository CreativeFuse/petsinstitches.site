
<?php
/**
 * Template • Getting Started
 *
 * The template file to render all parts of the 
 * Getting Started Page
 */

// Intro Section after hero image
Molecule_Router::render( 'page/getting-started', '_getting-started', 'intro');

// Prior to Your Visit section
Molecule_Router::render( 'page/getting-started', '_getting-started', 'section');

// Faqs
Molecule_Router::render( 'page/getting-started', '_getting-started', 'faqs');

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');

// Testimonial section
Molecule_Router::render( 'component', '_slider', 'testimonials');