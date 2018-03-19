<?php
/**
 * Partner • Grid
 */
?>

<div class="o-container o-container--max">

	<div class="o-row">

		<div class="o-col-md-12">

			<div class="c-partners__grid js-isotope-grid u-clearfix">

				<div class="c-partners__grid__sizer"></div>

				<?php 

					while( have_posts() ) : the_post();

						// Each item rendered uses the following card component
						Molecule_Router::render( 'post/partners', '_partner', 'card' );

						
					endwhile;
				?>

			</div>

	</div>
</div>