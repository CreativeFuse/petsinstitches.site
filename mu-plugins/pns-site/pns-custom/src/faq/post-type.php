<?php
/**
 * Config for the FAQ custom post type.
 *
 * @package     CreativeFuse\PetsInStitches\FAQ
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\FAQ;

return array(
	'post_type' => 'faqs',
	'labels'    => array(
		'custom_type'       => 'faqs',
		'singular_label'    => 'FAQ',
		'plural_label'      => 'FAQs',
		'in_sentence_label' => 'frequently asked questions (FAQs)',
		'text_domain'       => FAQ_TEXT_DOMAIN,
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
		'description' => 'Frequently Asked Questions (FAQ)',
		'label'       => __( 'FAQs', FAQ_TEXT_DOMAIN ),
		'labels'      => '', // automatically generate the labels.
		'public'      => true,
		'supports'    => '', // automatically generate the support features.
		'menu_icon'   => 'dashicons-editor-help',
		'has_archive' => true,
		'rewrite' => array(
			'with_front' => false,
		)
	),

);
