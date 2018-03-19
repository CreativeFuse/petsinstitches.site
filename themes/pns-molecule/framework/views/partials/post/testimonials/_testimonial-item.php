<?php

/**
 * Testimonial • Item
 */

// Set Our ACF prefix
$prefix = 'testimonial_';

// Set our ACF fields

$fields = array(

	'content',
	'name',
	'position'

);

/**
 * Get Data from ACF
 */

foreach ( $fields as $field ){


	if( get_field( $prefix . $field ) ){

		$testimonial[ $field ] = esc_html( get_field( $prefix . $field ) );

	}

}

?>

<div <?php post_class( array( 'c-box', 'u-clearfix' ) ); ?>>


	<div class="c-box__info">

		<div class="c-box__img-wrap">

			<img class="c-photo--fancy c-box__img" src="<?php echo Molecule_Router::get_img_meta( 'post', 'url' ); ?>" alt="<?php Molecule_Router::get_img_meta( 'post', 'alt' ); ?>" width="150" height="150">

		</div>

		<div class="c-box__author">

			<p class="e-h6 c-box__author__name">
				<?php echo $testimonial['name'] ?>
			</p>

			<p class="e-p--common c-box__author__title">
				<?php echo $testimonial['position'] ?>
			</p>

		</div>

	</div>

	<div class="c-box__content">

		<div class="c-box__content__holder">

			<p class="e-p--common c-box__copy">
				<?php echo $testimonial['content'] ?>
			</p>

			<div class="c-box__content__mask"></div>

		</div>

		<a class="c-btn c-btn--purple c-btn--fill c-btn--hover-outline c-box__more js-read-more" href="#"><?php echo esc_html( 'Read More' ); ?></a>

	</div>

</div>