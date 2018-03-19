<?php
/**
 * Testimonials Shortcode Handler
 *
 * @package     CreativeFuse\PetsInStitches\Testimonials
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Testimonials;

function process_testimonial_shortcode( array $config, array $attributes, $content, $shortcode_name ) {
	ob_start();

	render_testimonials( $attributes, $config );

	return ob_get_clean();
}

function render_testimonials( $attributes, $config ) {
	$query_args = array(
		'posts_per_page' => (int) $attributes['count'],
		'post_type'      => 'testimonials',
	);

	if ( 'all' !== $attributes['animal'] ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'animal',
				'field'    => 'slug',
				'terms'    => $attributes['animal'],
			),
		);
	}

	// this may not function properly until the featured meta field name is created, and they match
	if ( $attributes['featured'] ) {
		$query_args['meta_query'] = array(
			array(
				'key'     => 'testimonial_featured',
				'value'   => '1',
				'compare' => '=',
			),
		);
	}
	// print_r( $query_args );
	$testimonials = new \WP_Query( $query_args );
	// print_r( $testimonials );

	if ( ! $testimonials->have_posts() ) {
		echo 'No testimonies found.';

		return;
	}
	include( $config['view'] );

	wp_reset_postdata();
}
