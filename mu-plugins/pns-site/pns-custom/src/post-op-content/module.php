<?php
/**
 * Postop Content Module Handler
 *
 * @package     CreativeFuse\PetsInStitches\PostopContent
 * @since       1.0.2
 * @author      David Beeler
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\PostopContent;

/**
 * Get all Postoperative FAQs/Blogs
 * 
 * To call this from a template: 
 * $var_name = CreativeFuse\PetsInStitches\PostopContent\get_content_for_postop( $post_type, $taxonomy, $terms )
 * 
 * @param string $post_type
 * @param string $taxonomy
 * @param array|string $terms
 * 
 * @return object
 */
function get_content_for_postop( $post_type, $taxonomy, $terms ) {

	/**
	 * Query for the animal name that
	 * is under the 'postoperative-care'
	 * term parent.
	 */
	$args = array(
		'post_type' => $post_type,
		'tax_query' => array(
			array (
				'taxonomy' => $taxonomy,
				'field' => 'name',
				'terms' => $terms,
			),
			array (
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => 'postoperative-care',
				'operator' => 'IN'
			)
		),
	);

	$query = new \WP_Query( $args );

	wp_reset_postdata();

	return $query;

}