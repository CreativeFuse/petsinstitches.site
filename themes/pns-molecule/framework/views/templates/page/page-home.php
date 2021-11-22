<?php
/**
 * Template • Home
 *
 * The template file to render all parts of the
 * Home Page
 */


// Intro Section after hero image
Molecule_Router::render( 'page/home', '_home', 'intro');

// Low Price Guarantee
Molecule_Router::render( 'page/home', '_home', 'low-price');

// Petcare with Passion
Molecule_Router::render( 'page/home', '_home', 'petcare-passion');

// Benefits
Molecule_Router::render( 'page/home', '_home', 'petcare-benefits');

// Benefits
Molecule_Router::render( 'page/home', '_home', 'petcare-services-and-offerings');

// Choose your pet
Molecule_Router::render( 'page/home', '_home', 'choose-pet');

// Testimonial Slider
// Molecule_Router::render( 'component', '_slider', 'testimonials');

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');
