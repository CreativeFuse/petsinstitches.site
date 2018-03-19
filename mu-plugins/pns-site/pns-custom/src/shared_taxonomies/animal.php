<?php
/**
 * Config for the Services custom taxonomy, animal.
 *
 * @package     CreativeFuse\PetsInStitches
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches;

return array(
	'taxonomy'   => 'animal',
	'labels'     => array(
		'custom_type'       => 'animal',
		'singular_label'    => 'Animal',
		'plural_label'      => 'Animals',
		'in_sentence_label' => 'animals',
		'text_domain'       => SHARED_TAXONOMIES_TEXT_DOMAIN,
	),
	'args'       => array(
		'label'             => __( 'Animals', SHARED_TAXONOMIES_TEXT_DOMAIN ),
		'labels'            => '', // automatically generate the labels.
		'hierarchical'      => true,
		'show_admin_column' => true,
		/*'public'            => false,*/
		'publicly_queryable' => false,
		'show_ui'           => true,
	),
	'post_types' => array( 'service', 'testimonials' ),
);
