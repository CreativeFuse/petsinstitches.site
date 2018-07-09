<?php
/**
 * Post Op • Blogs Panel
 *
 */


// Set variables for query
$post_type = 'post';
$taxonomy = 'category';
$terms = get_field( 'post_op_animal_type' );

// Query for all postop blogs for a specific animal type
$postop_blog = CreativeFuse\PetsInStitches\PostopContent\get_content_for_postop( $post_type, $taxonomy, $terms);

?>


<div id="panel--<?php esc_html_e( $output ); ?>" class="o-panel o-panel--post-op">

	<div class="o-section o-section--sub-page">

		<div class="o-container o-container--max--small">

			<div class="o-row o-row--sub-page p-post-op__row">

				<div itemscope itemtype="http://schema.org/Blog" class="o-section o-section--post-archive">

					<div class="o-container o-container--max">

						<div class="o-row">

							<div class="c-card__feed">

								<?php

								if ( $postop_blog->have_posts() ) {

									while ( $postop_blog->have_posts() ) {

										$postop_blog->the_post();

										// Load Our Post Item
										Molecule_Router::render( 'post/post', '_post', 'archive-feed__item' );

									}

								} ?>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>