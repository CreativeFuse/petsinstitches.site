<?php
/**
 * Config for the Partners custom post type.
 *
 * @package     CreativeFuse\PetsInStitches\Partners
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Partners;

return array(
	'post_type' => 'partners',
	'labels'    => array(
		'custom_type'       => 'partners',
		'singular_label'    => 'Partner',
		'plural_label'      => 'Partners',
		'in_sentence_label' => 'partner',
		'text_domain'       => PARTNERS_TEXT_DOMAIN,
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
		'description' => 'Partners',
		'label'       => __( 'Partners', PARTNERS_TEXT_DOMAIN ),
		'labels'      => '', // automatically generate the labels.
		'public'      => true,
		'supports'    => '', // automatically generate the support features.
		'menu_icon'   => 'dashicons-groups',
		'has_archive' => true,
		'rewrite' => array(
			'with_front' => false
		)
	),

);
