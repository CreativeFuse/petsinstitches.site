<!-- <span> is in _post-single-header.php -->

	<div class="o-section o-section--post-body">

		<div class="o-container o-container--max">

			<div class="o-row">

				<div class="o-col-md-12">
					
					<div class="o-post">

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

							<img itemprop="image thumbnailUrl" class="o-post__featured-img" src="<?php echo Molecule_Router::get_img_meta( 'post', 'url' );?>" alt="<?php echo Molecule_Router::get_img_meta( 'post', 'alt' ); ?>">

						<?php } else { ?>

							<meta itemprop="image" content="https:<?php Molecule_Router::get_img_meta( 'acf_options', 'url', 'blog_fallback_img' ); ?>" />

						<?php } ?>

						<span itemprop="articleBody text"><?php the_content(); ?></span>

					</div>

				</div>

			</div>

		</div>
		
	</div>

</span>
