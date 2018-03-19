<?php
/**
 * Service • Panels
 *
 * Loop through and load the panels that hold the actual
 * output of content and data.
 */

// The output of each panel should use the partial below
// I ahve included it 4 times for demonstration purposes

foreach ( $output AS $service ) {
	Molecule_Router::render( 'post/services', '_service', 'panel__item', $service );
}
