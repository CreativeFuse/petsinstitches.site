<div class="c-slider c-slider--testimonials">

	<ul class="c-slider__well">

		<?php
		while ( $output->have_posts() ) : $output->the_post();
		
			// Each item rendered uses the following component
			Molecule_Router::render( 'post/testimonials', '_testimonial-shortcode', 'item' );

		endwhile;

		?>

	</ul>
	
</div>