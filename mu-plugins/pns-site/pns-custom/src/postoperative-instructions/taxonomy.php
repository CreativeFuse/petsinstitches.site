<?php
/**
 * Config for the PostOpInstructions custom taxonomy, pets.
 *
 * @package     CreativeFuse\PetsInStitches\PostOpInstructions
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\PostOpInstructions;

return array(
	'taxonomy'   => 'pet',
	'labels'     => array(
		'custom_type'       => 'pet',
		'singular_label'    => 'Pet',
		'plural_label'      => 'Pets',
		'in_sentence_label' => 'pet',
		'text_domain'       => POSTOPINSTRUCTIONS_TEXT_DOMAIN,
	),
	'args'       => array(
		'label'             => __( 'Pets', POSTOPINSTRUCTIONS_TEXT_DOMAIN ),
		'labels'            => '', // automatically generate the labels.
		'hierarchical'      => true,
		'show_admin_column' => true,
		/*'public'            => false,*/
		'publicly_queryable' => false,
		'show_ui'           => true,
	),
	'post_types' => array( 'postopcare' ),
);
