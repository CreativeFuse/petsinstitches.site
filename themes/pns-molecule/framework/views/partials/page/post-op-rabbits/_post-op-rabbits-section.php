<?php

if( get_row_layout() == 'text_block' ){
  ?>
    <div class="post-op-subsection">
      <?php if( get_sub_field('title') ){?>
        <h3 class="secondary-heading-m">
          <span><?php echo get_sub_field('title'); ?></span>
        </h3>
      <?php } ?>
      <div class="e-p--common-subsection">
        <?php echo get_sub_field('text'); ?>
      </div>
    </div>
  <?php
}elseif( get_row_layout() == 'accordion' ){ ?>
  <div class="p-post-op__row__accordion">

    <div class="c-accordion c-accordion--simple c-accordion--simple--1" style="margin-bottom: 20px;">

      <div class="c-accordion--simple__header u-clearfix">
        <h5 class="e-h6 c-accordion--simple__header__title u-text-up">
          <?php echo get_sub_field('title'); ?>
        </h5>
        <div class="c-accordion__icon c-accordion__icon--simple">
          <div class="c-accordion__icon-bar 
          c-accordion__icon-bar--1"></div>
          <div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>
        </div>
      </div>

      <div class="c-accordion--simple__body u-clearfix">
        <?php
          $imges = get_sub_field( 'gallery' );
          foreach ($imges as $img_id => $img) {
              $img_src = $img['sizes']['medium'];
              $img_lightbox = $img['url'];
              $img_alt = $img['alt']; 
              $img_cap = $img['caption'];
            ?>
            <div class="o-col-md-4">
              <a href="<?php echo esc_url( $img_lightbox ); ?>" data-rel="lightcase:lightcase:postopGalleryNormal" title="<?php echo esc_html( $img_cap ); ?>" class="c-accordion--simple__body__img-wrap">
                <img class="c-photo c-photo--fancy" src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_html( $img_alt ); ?>">
              </a>
            </div>
          <?php }
        ?>
      </div>

    </div>

  </div>
<?php }