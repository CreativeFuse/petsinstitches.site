<?php

/**
 * Testimonial • Item
 */

// Set Our ACF prefix
$prefix = 'testimonial_';

// Set our ACF fields

$fields = array(

	'snippet',
	'name',
	'position',


);

/**
 * Get Data from ACF
 */

// print_r( $output );

foreach ( $fields as $field ){


	if( get_field( $prefix . $field ) ){

		$testimonial[ $field ] = esc_html( get_field( $prefix . $field ) );

	}

}

?>

<li class="c-slider--testimonial__item">


	<img class="c-photo--fancy c-box__img" src="<?php echo Molecule_Router::get_img_meta( 'post', 'url' ); ?>" alt="<?php Molecule_Router::get_img_meta( 'post', 'alt' ); ?>" width="150" height="150">

	<div class="c-testimonial--featured__body">

		<div class="c-testimonial--featured__snippet">

				<blockquote class="c-testimonial__copy u-color--blue-d">
					"<?php echo $testimonial['snippet'] ?>"
				</blockquote>

		</div>

		<div class="c-testimonial--featured__author">

			<p class="e-h6 c-testimonial--featured__author__name u-color--blue-m">
				<?php echo $testimonial['name'] . ', ' . $testimonial['position']; ?>
			</p>

		</div>

	</div>

</li>