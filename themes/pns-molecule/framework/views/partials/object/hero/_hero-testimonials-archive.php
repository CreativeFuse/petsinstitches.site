<?php
/**
 * HERO • Testimonial Archive
 */


/**
 * Set variables we need to work with
 */
$animal = get_query_var( 'animal' );
$term = get_term_by( 'slug', $animal, 'animal' );

// If a specific animal is queried
if( $animal ){

	$type = 'acf';
	$field = 'animal_testimonial_bg';
	$sub_title = 'for ' . ucfirst( $animal );
	$title = 'Testimonials';
	$term  = 'term_' . $term->term_id;

// Otherwise, load default Testimonial Archive stuff
} else {

	$type = 'acf_options';
	$field = 'testimonials_bg';
	$title = 'Testimonials';
	$term = '';
}

// Begin our Output
?>

<div class="o-hero o-hero--testimonials" style="background-image:url( <?php echo Molecule_Router::get_img_meta( $type, 'url', $field, $term );?>)">

	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-title-group c-title-group--hero u-max-width--400">

					<h1 class="e-h1 c-title-group__title u-color--blue"><?php esc_html_e( $title ); ?></h1>

					<?php if( $animal ){ ?>

					<h1 class="e-h2 c-title-group__sub u-color--blue-m"><?php esc_html_e( $sub_title ); ?></h1>

					<?php } ?>
					
				</div>

			</div>

		</div>

	</div>

</div>