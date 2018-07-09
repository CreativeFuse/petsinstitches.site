<?php
/**
 * Post Op • FAQs Panel
 *
 */


// Set variables for query
$post_type = 'faqs';
$taxonomy = 'topic';
$terms = get_field( 'post_op_animal_type' );

// Query for all postop faqs for a specific animal type
$postop_faqs = CreativeFuse\PetsInStitches\PostopContent\get_content_for_postop( $post_type, $taxonomy, $terms );

?>


<div id="panel--<?php esc_html_e( $output ); ?>" class="o-panel o-panel--post-op">

	<div class="o-section o-section--sub-page">

		<div class="o-container o-container--max--small">

			<div class="o-row o-row--sub-page p-post-op__row">

				<div class="p-faq__section">

					<h2 class="e-h2 c-title-group__title u-color--blue">Postoperative Care FAQs</h2>

					<?php

					if ( $postop_faqs->have_posts() ) {

						while ( $postop_faqs->have_posts() ) {

							$postop_faqs->the_post();

							// Build array for _faq-accordion.php
							$postop_faq = array(
								'faq_id' 	=> get_the_ID(),
								'faq_title'	=> get_the_title()
							);

							// Each item rendered uses the following component
							Molecule_Router::render( 'post/faqs', '_faq', 'accordion', $postop_faq );

						}

					}

					wp_reset_postdata();

					?>

				</div>

			</div>

		</div>

	</div>

</div>