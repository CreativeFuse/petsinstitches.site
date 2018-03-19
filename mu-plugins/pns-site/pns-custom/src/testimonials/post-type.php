<?php
/**
 * Config for the Testimonial custom post type.
 *
 * @package     CreativeFuse\PetsInStitches\Testimonials
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Testimonials;

return array(
	'post_type' => 'testimonials',
	'labels'    => array(
		'custom_type'       => 'testimonials',
		'singular_label'    => 'Testimonial',
		'plural_label'      => 'Testimonials',
		'in_sentence_label' => 'testimonials',
		'text_domain'       => TESTIMONIAL_TEXT_DOMAIN,
	),
	'features'  => array(
		'base_post_type' => 'post',
		'exclude'        => array(
			'excerpt',
			'comments',
			'trackbacks',
			'custom-fields',
			'post-formats',
		),
		'additional'     => array(
			'page-attributes',
		),
	),
	'args'      => array(
		'description' => 'Testimonials',
		'label'       => __( 'Testimonials', TESTIMONIAL_TEXT_DOMAIN ),
		'labels'      => '', // automatically generate the labels.
		'public'      => true,
		'supports'    => '', // automatically generate the support features.
		'menu_icon'   => 'dashicons-format-quote',
		'has_archive' => true,
		'rewrite' => array(
			'with_front' => false
		)
	),

);
