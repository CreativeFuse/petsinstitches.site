<?php
/**
 * Config for the Services custom taxonomy, type.
 *
 * @package     CreativeFuse\PetsInStitches\Services
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Services;

return array(
	'taxonomy'   => 'type',
	'labels'     => array(
		'custom_type'       => 'type',
		'singular_label'    => 'Type',
		'plural_label'      => 'Types',
		'in_sentence_label' => 'types',
		'text_domain'       => SERVICES_TEXT_DOMAIN,
	),
	'args'       => array(
		'label'             => __( 'Types', SERVICES_TEXT_DOMAIN ),
		'labels'            => '', // automatically generate the labels.
		'hierarchical'      => true,
		'show_admin_column' => true,
		/*'public'            => false,*/
		'publicly_queryable' => false,
		'show_ui'           => true,
	),
	'post_types' => array( 'service' ),
);
