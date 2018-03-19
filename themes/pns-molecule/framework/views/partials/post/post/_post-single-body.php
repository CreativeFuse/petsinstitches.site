<div class="o-section o-section--post-body">
	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">
				

				<div class="o-post">

					<?php if( has_post_thumbnail() ){ ?>

						<img class="o-post__featured-img" src="<?php echo Molecule_Router::get_img_meta( 'post', 'url' );?>" alt="<?php echo Molecule_Router::get_img_meta( 'post', 'alt' );?>">

					<?php } ?>

					<?php the_content(); ?>

				</div>

				
			</div>
		</div>
	</div>
</div>

