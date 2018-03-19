<?php
/**
 * Config for the FAQ custom taxonomy, topic.
 *
 * @package     CreativeFuse\PetsInStitches\FAQ
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\FAQ;

return array(
	'taxonomy'   => 'topic',
	'labels'     => array(
		'custom_type'       => 'topic',
		'singular_label'    => 'Topic',
		'plural_label'      => 'Topics',
		'in_sentence_label' => 'topics',
		'text_domain'       => FAQ_TEXT_DOMAIN,
	),
	'args'       => array(
		'label'             => __( 'Topics', FAQ_TEXT_DOMAIN ),
		'labels'            => '', // automatically generate the labels.
		'hierarchical'      => true,
		'show_admin_column' => true,
		/*'public'            => false,*/
		'publicly_queryable' => false,
		'show_ui'           => true,
	),
	'post_types' => array( 'faqs' ),
);
