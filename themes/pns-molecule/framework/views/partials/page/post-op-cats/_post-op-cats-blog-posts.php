<?php
$post_title = $output->post_title;
$post_date = date_create($output->post_date);
$post_modified = date_create($output->post_modified);
$post_link = get_permalink($output->ID);
$featured_img = get_the_post_thumbnail_url( $output->ID );
?>

    <a itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" class="c-card c-card--post" href="<?php echo esc_url( $post_link ); ?>" title="<?php echo $post_title; ?>">

      <meta itemprop="datePublished" content="<?php echo date_format($post_date,"F j, Y"); ?>" />

      <meta itemprop="dateModified" content="<?php echo date_format($post_modified,"F j, Y"); ?>" />

      <meta itemprop="mainEntityOfPage url" content="<?php echo esc_url( $post_link ); ?>" />

      <meta itemprop="isFamilyFriendly" content="True" />

      <span itemprop="author publisher" itemscope itemtype="http://schema.org/Organization">

        <meta itemprop="name" content="Pets in Stitches"/>

        <span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">

          <img itemprop="url" class="u-vis-hide c-nav__logo__img c-nav__logo__img--desktop" src="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'url', 'nav_logo_desktop' ); ?>" alt="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'alt', 'nav_logo_desktop' ); ?>">

        </span>

      </span>

      <?php if( $featured_img ){ ?>

        <meta itemprop="image thumbnailUrl" content="<?php echo $featured_img; ?>" />

      <?php } else { ?>

        <meta itemprop="image" content="<?php Molecule_Router::get_img_meta( 'acf_options', 'url', 'blog_fallback_img'  );  ?>" />

      <?php } ?>
      

      <div class="c-card--post__header">

        <?php if( $featured_img ){ ?>
          
          <div class="c-card--post__bg" style="background-image:url(<?php echo $featured_img;  ?> )"></div>

        <?php } else { ?>
          
          <div class="c-card--post__bg" style="background-image:url(<?php Molecule_Router::get_img_meta( 'acf_options', 'url', 'blog_fallback_img' );  ?> )"></div>

        <?php } ?>

      </div>

      <div class="c-card--post__body">
          <div class="c-title-group c-title-group--post">

            <h2 itemprop="name headline" class="c-card--post__title c-title-group__title e-h3 u-color--blue">
              <?php echo $post_title; ?>
            </h2>

          </div>
          <div class="c-card--post__footer">
              <p class="c-card--post__date c-title-group__sub e-p--small u-color--gray e-p--common">
                <?php echo date_format($post_date,"F j, Y"); ?>
              </p>
              <div class="post-arrow">
                 <img class="" style="" src="/wp-content/uploads/2021/10/next.png" />
              </div>
          </div>
        

      </div>

    </a>
