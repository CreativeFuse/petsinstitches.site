<?php
/**
 * Config for the Services custom post type.
 *
 * @package     CreativeFuse\PetsInStitches\Services
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Services;

return array(
	'post_type' => 'service',
	'labels'    => array(
		'custom_type'       => 'service',
		'singular_label'    => 'Service',
		'plural_label'      => 'Services',
		'in_sentence_label' => 'service',
		'text_domain'       => SERVICES_TEXT_DOMAIN,
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
		'description' => 'Services',
		'label'       => __( 'Services', SERVICES_TEXT_DOMAIN ),
		'labels'      => '', // automatically generate the labels.
		'public'      => true,
		'supports'    => '', // automatically generate the support features.
		'menu_icon'   => 'dashicons-book-alt',
		'has_archive' => true,
		'rewrite' => array(
			'with_front' => false,
		),
	),

);
