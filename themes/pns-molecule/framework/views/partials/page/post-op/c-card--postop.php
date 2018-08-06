<a class="c-card c-card--post" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">

	<div class="c-card--post__header">

		 <?php if( has_post_thumbnail() ){ ?>

			<div class="c-card--post__bg" style="background-image:url(<?php Molecule_Router::get_img_meta( 'post', 'url' );  ?> )"></div>

		<?php } else { ?>

			<div class="c-card--post__bg" style="background-image:url(<?php Molecule_Router::get_img_meta( 'acf_options', 'url', 'blog_fallback_img' );  ?> )"></div>

		<?php } ?>

		<div class="c-title-group c-title-group--post">

			<h2 class="c-card--post__title c-title-group__title e-h6 u-text-up u-color--blue">
				<?php the_title(); ?>
			</h2>

			<p class="c-card--post__date c-title-group__sub e-p--small u-color--gray">
				<?php the_date(); ?>
			</p>

		</div>

	</div>

	<div class="c-card--post__body">

		<p class="c-card--post__excerpt e-p--common">
			<span><?php the_excerpt(); ?></span>
		</p>

	</div>

</a>