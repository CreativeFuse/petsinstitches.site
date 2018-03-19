<?php
/**
 * Template • Archive Services
 *
 * The template file to render all parts of the 
 * Services Archive
 */

// Tabbed navigation and content for our Services
Molecule_Router::render( 'post/services', '_service', 'tabs');


// Request an Appointment
Molecule_Router::render( 'object/cta', '_request', 'appointment');