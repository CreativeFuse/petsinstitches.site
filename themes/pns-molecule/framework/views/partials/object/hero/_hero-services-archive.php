<?php
/**
 * HERO • Services Archive
 */


/**
 * Set variables we need to work with
 */
$animal = get_query_var( 'animal' );
$term = get_term_by( 'slug', $animal, 'animal' );

$title_append = ' Services';
$tee_up = 'Please start by choosing from the options below';


// If a specific animal is queried
if( $animal ){

	$type = 'acf';
	$field = 'animal_services_bg';
	$title = ucfirst( rtrim( $animal, 's' ) );
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

<div class="o-hero o-hero--services" style="background-image:url( <?php echo Molecule_Router::get_img_meta( $type, 'url', $field, $term );?>)">

	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-title-group c-title-group--hero u-max-width--400">

					<h1 class="e-h1 c-title-group__title u-color--blue"><?php esc_html_e( $title . $title_append ); ?></h1>
					<p class="e-p--large c-title-group__sub"><?php esc_html_e( $tee_up );?></p>

				</div>

			</div>

		</div>

	</div>

</div>