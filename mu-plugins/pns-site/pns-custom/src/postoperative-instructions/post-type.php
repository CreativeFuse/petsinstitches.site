<?php
/**
 * Config for the Post-Op Instructions custom post type.
 *
 * @package     CreativeFuse\PetsInStitches\PostOpInstructions
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\PostOpInstructions;

return array(
	'post_type' => 'postopcare',
	'labels'    => array(
		'custom_type'       => 'postopcare',
		'singular_label'    => 'Post-Op Instructions',
		'plural_label'      => 'Post-Op Instructions',
		'in_sentence_label' => 'Post-Op Instructions',
		'text_domain'       => POSTOPINSTRUCTIONS_TEXT_DOMAIN,
	),
	'features'  => array(
		'base_post_type' => 'post',
		'exclude'        => array(
			'excerpt',
			'comments',
			'trackbacks',
			'custom-fields',
		),
		'additional'     => array(
			'page-attributes',
		),
	),
	'args'      => array(
		'description' => 'Post-Op Instructions',
		'label'       => __( 'Post-Op Instructions', POSTOPINSTRUCTIONS_TEXT_DOMAIN ),
		'labels'      => '', // automatically generate the labels.
		'public'      => true,
		'supports'    => '', // automatically generate the support features.
		'menu_icon'   => 'dashicons-heart',
		'has_archive' => true,
		'rewrite' => array(
			'with_front' => false,
		)
	),

);
