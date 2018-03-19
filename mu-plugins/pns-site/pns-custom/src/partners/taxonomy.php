<?php
/**
 * Config for the Partners custom taxonomy, Business Type.
 *
 * @package     CreativeFuse\PetsInStitches\Partners
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Partners;

return array(
	'taxonomy'   => 'business_type',
	'labels'     => array(
		'custom_type'       => 'business_type',
		'singular_label'    => 'Business Type',
		'plural_label'      => 'Business Types',
		'in_sentence_label' => 'business types',
		'text_domain'       => PARTNERS_TEXT_DOMAIN,
	),
	'args'       => array(
		'label'             => __( 'Business Types', PARTNERS_TEXT_DOMAIN ),
		'labels'            => '', // automatically generate the labels.
		'hierarchical'      => true,
		'show_admin_column' => true,
		/*'public'            => false,*/
		'publicly_queryable' => false,
		'show_ui'           => true,
	),
	'post_types' => array( 'partners' ),
);
