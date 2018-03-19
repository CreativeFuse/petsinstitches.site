<?php
/**
 * Template • Archive FAQ
 *
 * The template file to render all parts of the 
 * FAQ Archive
 */


// The actual output of all testimonials
Molecule_Router::render( 'post/faqs', '_faq', 'list');

// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');