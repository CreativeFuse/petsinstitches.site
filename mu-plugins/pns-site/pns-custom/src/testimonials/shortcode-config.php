<?php
/**
 * Testimonials Shortcode Config
 *
 * @package     CreativeFuse\PetsInStitches\Testimonials
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Testimonials;

return array(
	'shortcode_name'              => 'testimonial',
	'do_shortcode_within_content' => false,
	'processing_function'         => __NAMESPACE__ . '\process_testimonial_shortcode',
	'view'                        => get_stylesheet_directory() . '/framework/views/templates/shortcode/shortcode-testimonials.php',
	'defaults'                    => array(
		'animal'   => 'all',
		'count'    => 3,
		'featured' => false,
	),
);