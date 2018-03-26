<div itemscope itemtype="http://schema.org/Blog" class="o-section o-section--post-archive">
	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="c-card__feed">

		<?php 

			// The Loop

			if( have_posts() )	{

				while( have_posts() ){

					the_post();

					// Load Our Post Item
					Molecule_Router::render( 'post/post', '_post', 'archive-feed__item' );

				}

			} ?>
			
			</div>

		</div>
	</div>
</div>

