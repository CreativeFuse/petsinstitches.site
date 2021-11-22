<?php
/**
 * POST OP CARE PET HERO • Page
 */

/**
 * Set variables we need to work with
 */

	$title = get_the_title();
	$sub_title = '';

	if( get_field( 'hero_title' ) ){
		$title = get_field( 'hero_title' );
	}

	if( get_field( 'hero_sub_title' ) ){
		$sub_title = get_field( 'hero_sub_title' );
	}
  global $post;
  $post_slug = $post->post_name;
  $pets = array(
    'cats' => array(
      'dogs' => array(
        'title' => 'VIEW DOG',
        'link' => '/postoperative-care/dogs/'
      ),
      'rabbits' => array(
        'title' => 'VIEW RABBIT',
        'link' => '/postoperative-care/rabbits/'
      )
      ),
    'dogs' => array(
      'cats' => array(
        'title' => 'VIEW CAT',
        'link' => '/postoperative-care/cats/'
      ),
      'rabbits' => array(
        'title' => 'VIEW RABBIT',
        'link' => '/postoperative-care/rabbits/'
      )
      ),
    'rabbits' => array(
      'cats' => array(
        'title' => 'VIEW CAT',
        'link' => '/postoperative-care/cats/'
      ),
      'dogs' => array(
        'title' => 'VIEW DOG',
        'link' => '/postoperative-care/dogs/'
      )
    )
  );
?>



<div class="o-hero--page--pets o-hero--page--<?php echo Molecule_Display::page_title(); ?>" style="">

	<div class="o-container o-container--max">

		<div class="o-row">
      <div class="o-col-xs-12 o-col-sm-2 o-col-md-2 post-op-featured-image">
        <img src="<?php echo Molecule_Router::get_img_meta( 'post', 'url' );?>)" alt="">
      </div>

      <div class="o-col-xs-12 o-col-sm-8 o-col-md-8">
        <div class="c-title-group c-title-group--hero u-max-width--600">

          <h1 class="e-h1 c-title-group__title u-color--blue"><?php esc_html_e( $title ); ?></h1>

          <?php if( $sub_title ){ ?>

            <h1 class="e-h2 c-title-group__sub u-color--blue-m"><?php esc_html_e( $sub_title ); ?></h1>

          <?php } ?>
          
        </div>
      </div>

      <div class="o-col-xs-12 o-col-sm-2 o-col-md-2 postop-pet-nav e-p--common">
        <?php
          foreach ($pets[$post_slug] as $pet) { ?>
            <a href="<?php echo $pet['link']; ?>">
              <span><?php echo $pet['title']; ?></span>
              <span class="arrow">
                <svg width="18" height="18" viewBox="0 0 24 24">
                  <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                </svg>
              </span>
            </a>
          <?php }
        ?>
      </div>
		</div>

	</div>

</div>