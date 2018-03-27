<a itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" class="c-card c-card--post" href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">

	<meta itemprop="articleSection" content="<?php $c = get_the_category(); echo esc_html( $c[0]->name ); ?>" />

	<meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>" />

	<meta itemprop="dateModified" content="<?php echo the_modified_date('c'); ?>" />

	<meta itemprop="mainEntityOfPage url" content="<?php echo esc_url( the_permalink() ); ?>" />

	<meta itemprop="isFamilyFriendly" content="True" />

	<span itemprop="author publisher" itemscope itemtype="http://schema.org/Organization">

		<meta itemprop="name" content="Pets in Stitches"/>

		<span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">

			<img itemprop="url" class="u-vis-hide c-nav__logo__img c-nav__logo__img--desktop" src="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'url', 'nav_logo_desktop' ); ?>" alt="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'alt', 'nav_logo_desktop' ); ?>">

		</span>

	</span>

	<?php if( has_post_thumbnail() ){ ?>

		<meta itemprop="image thumbnailUrl" content="https:<?php Molecule_Router::get_img_meta( 'post', 'url' );  ?>" />

	<?php } else { ?>

		<meta itemprop="image" content="https:<?php Molecule_Router::get_img_meta( 'acf_options', 'url', 'blog_fallback_img'  );  ?>" />

	<?php } ?>
	

	<div class="c-card--post__header">

		 <?php if( has_post_thumbnail() ){ ?>

			<div class="c-card--post__bg" style="background-image:url(<?php Molecule_Router::get_img_meta( 'post', 'url' );  ?> )"></div>

		<?php } else { ?>

			<div class="c-card--post__bg" style="background-image:url(<?php Molecule_Router::get_img_meta( 'acf_options', 'url', 'blog_fallback_img' );  ?> )"></div>

		<?php } ?>

		<div class="c-title-group c-title-group--post">

			<h2 itemprop="name headline" class="c-card--post__title c-title-group__title e-h6 u-text-up u-color--blue">
				<?php the_title(); ?>
			</h2>

			<p class="c-card--post__date c-title-group__sub e-p--small u-color--gray">
				<?php the_date(); ?>
			</p>

		</div>

	</div>

	<div class="c-card--post__body">

		<p class="c-card--post__excerpt e-p--common">
			<span itemprop="about"><?php the_excerpt(); ?></span>
		</p>

	</div>

</a>

