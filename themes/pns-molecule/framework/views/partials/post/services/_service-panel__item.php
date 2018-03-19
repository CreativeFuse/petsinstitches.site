<?php
/**
 * The file responsible for the output of each panel and its content
 *
 */

// Begin Building our title

$title_prepend = 'Choose a ';

// Set Fallback Title
$title = $output['term_name'];

// Build a class to use based on the title
$title_class = sanitize_title_with_dashes( $title );

// Get our custom ACF Title
if ( get_field( 'service_type_page_title', 'type_' . $output['term_id'] ) ) {
	$title = get_field( 'service_type_page_title', 'type_' . $output['term_id'] );
}

// Build the complete Title
$title = $title_prepend . $title;

?>

<div id="panel--<?php esc_html_e( $title_class ); ?>" class="o-panel o-panel--service o-panel--service--<?php esc_html_e( $title_class ); ?>">

	<div class="o-panel__header o-container o-container--max">

		<div class="o-row">


			<div class="o-col-md-12">


				<?php // The Intro to our service ?>

				<div class="c-title-group u-max-width--900">

					<h2 class="e-h2 c-title-group__title u-color--blue"><?php esc_html_e( $title ); ?></h2>

					<p class="e-p--common c-title-group__sub"><?php esc_html_e( $output['term_description'] ); ?></p>

				</div>

				<?php Molecule_Router::render( 'component', '_service', 'considerations' ); ?>

			</div>

		</div>

	</div>

	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">


				<?php // The accordion group wrapper ?>

				<div class="c-accordion__group">


					<?php
					
					// On Each Loop through, use the following partial to
					// build the accordion for each child term
					foreach ( $output['sub_types'] AS $service_sub_type ) {
						Molecule_Router::render( 'post/services', '_service', 'accordion', $service_sub_type );
					}

					?>

				</div>


			</div>
		</div>

	</div>


</div>