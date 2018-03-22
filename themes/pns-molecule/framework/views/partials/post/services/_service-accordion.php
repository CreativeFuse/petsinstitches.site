<?php
/**
 * Service • Accordion
 */

$service_name = $output['term_name'];

?>




<div itemprop="itemListElement" itemscope itemtype="http://schema.org/OfferCatalog" class="c-accordion c-accordion--fancy js-expand-accordion <?php echo $service_name; ?>" href="#">

	<div class="c-accordion--fancy__container">

		<div class="c-accordion--fancy__header u-clearfix">

			<h3 class="e-h3 c-accordion--fancy__title">
				<span itemprop="name"><?php echo esc_html( $output['term_name'] ); ?></span>
			</h3>
			
			<p class="e-p--common c-accordion--fancy__description">
				<span itemprop="description"><?php echo esc_html( $output['term_description'] ); ?></span>
			</p>

			<div class="c-accordion__icon c-accordion__icon--fancy">
			 	<div class="c-accordion__icon-bar c-accordion__icon-bar--1"></div>
			 	<div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>
	 		</div>

		</div>


		<div class="c-accordion--fancy__body u-clearfix">
			
			<?php
				// Loop through the posts related to this Child Term.
				// On each loop, output the post item using the following partial
			?>
			<?php foreach ( $output['services'] AS $service_post ) : ?>

					<?php Molecule_Router::render( 'post/services', '_service', 'card', $service_post ); ?>

			<?php endforeach; ?>

		</div>

	</div>

</div>

