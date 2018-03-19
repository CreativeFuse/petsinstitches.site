<div class="o-container o-container--max">

	<div class="o-row">

		<div class="o-col-md-12">

			<div class="c-testimonials">

				<?php 


					while( have_posts() ) : the_post();

						// Each item rendered uses the following component
						Molecule_Router::render( 'post/testimonials', '_testimonial', 'item' );

					endwhile;
						
				?>

			</div>

	</div>
</div>