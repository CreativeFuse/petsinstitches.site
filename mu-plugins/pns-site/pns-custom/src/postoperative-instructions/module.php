<?php
/**
 * PostOp Instructions Module Handler
 *
 * @package     CreativeFuse\PetsInStitches\PostOpInstructions
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\PostOpInstructions;

define( 'POSTOPINSTRUCTIONS_TEXT_DOMAIN', PNS_CUSTOM_TEXT_DOMAIN );
define( 'POSTOPINSTRUCTIONS_MODULE_DIR', trailingslashit( __DIR__ ) );

add_filter( 'add_custom_post_type_config', __NAMESPACE__ . '\register_postopinstructions_configs' );
add_filter( 'add_custom_taxonomy_config', __NAMESPACE__ . '\register_postopinstructions_configs' );

/**
 * Register CPT and Custom Taxonomy config files
 *
 * @param array $configs
 *
 * @return array
 */
function register_postopinstructions_configs( array $configs ) {
	$doing_post_type = current_filter() == 'add_custom_post_type_config';

	$config_file = $doing_post_type
		? 'post-type'
		: 'taxonomy';

	$runtime_config = (array) require( POSTOPINSTRUCTIONS_MODULE_DIR . '/' . $config_file . '.php' );

	if ( empty( $runtime_config ) ) {
		return $configs;
	}

	$key = $doing_post_type
		? $runtime_config['post_type']
		: $runtime_config['taxonomy'];

	$configs[ $key ] = $runtime_config;

	return $configs;
}

/**
 * get all FAQs grouped by their topic
 *
 * to call this from a template: $var_name = CreativeFuse\PetsInStitches\PostOpInstructions\get_faqs()
 *
 * @return array
 */
function get_postopcare() {
	$postopcare_records = get_postopcare_grouped_by_pets();

	$grouped_postopcare = array();

	foreach ( $postopcare_records AS $record ) {
		$pet_id = (int) $record->term_id;
		$record_id   = (int) $record->post_id;

		if ( ! array_key_exists( $pet_id, $grouped_postopcare ) ) {
			$grouped_postopcare[ $pet_id ] = array(
				'pet_id'          => $pet_id,
				'pet_name'        => $record->term_name,
				'pet_description' => $record->description,
				'pet_slug'        => $record->term_slug,
				'records'              => array(),
			);
		}

		$grouped_postopcare[ $pet_id ]['records'][ $record_id ] = array(
			'record_id'      => $record_id,
			'record_title'   => $record->post_title,
			'record_slug'   => $record->post_name,
			'record_content' => $record->post_content,
			'record_order'   => $record->menu_order,
		);
	}

	return $grouped_postopcare;

}

/**
 * custom query to pull all FAQs grouping them by topic
 *
 * @return array|bool
 */
function get_postopcare_grouped_by_pets() {
	global $wpdb;

	$postopcare_query = "SELECT t.term_id, t.name AS term_name, t.slug AS term_slug, tt.description, p.ID AS post_id, p.post_title, p.post_content, p.menu_order, p.post_name
FROM {$wpdb->term_taxonomy} AS tt
INNER JOIN {$wpdb->terms} AS t ON (tt.term_id = t.term_id)
INNER JOIN {$wpdb->term_relationships} AS tr ON (tt.term_taxonomy_id = tr.term_taxonomy_id)
INNER JOIN {$wpdb->posts} AS p ON (tr.object_id = p.ID)
WHERE p.post_status = 'publish' AND p.post_type = %s AND tt.taxonomy = %s AND tt.parent = 0
GROUP BY t.term_id, p.ID
ORDER BY tt.order, t.term_id, p.menu_order ASC;";

	$postopcare_query = $wpdb->prepare( $postopcare_query, 'postopcare', 'pet' );

	$results = $wpdb->get_results( $postopcare_query );

	if ( ! $results || ! is_array( $results ) ) {
		return false;
	}

	return $results;
}

add_action( 'restrict_manage_posts', __NAMESPACE__ . '\add_pets_filter_to_admin_post_list' );

function add_pets_filter_to_admin_post_list() {
	if ( empty( $_GET['post_type'] ) ) {
		return;
	}

	if ( 'postopcare' != $_GET['post_type'] ) {
		return;
	}

	$taxonomy_dropdown_args = array(
		'show_option_all' => 'All pets',
		'taxonomy'        => 'pet',
		'orderby'         => 'name',
		'hide_empty'      => false,
		'name'            => 'pet_filter',
		'selected'        => ( ! empty( $_GET['pets_filter'] ) ) ? $_GET['pets_filter'] : 0,
		'value_field'     => 'slug',
	);
	wp_dropdown_categories( $taxonomy_dropdown_args );
}

add_filter( 'pre_get_posts', __NAMESPACE__ . '\filter_by_pet' );

function filter_by_pet( $query ) {
	if ( ! is_admin() || empty( $_GET['pet_filter'] ) || '0' === $_GET['pet_filter'] ) {
		return;
	}
	$taxquery = array(
		'taxonomy' => 'pet',
		'field'    => 'slug',
		'terms'    => $_GET['pet_filter'],
	);

	$query->query_vars['tax_query'][] = $taxquery;
}

add_filter( 'manage_postopcare_posts_columns', __NAMESPACE__ . '\update_postopcare_admin_columns' );
/**
 * Remove author column
 *
 * @param $columns
 *
 * @return array    Modified array of column names
 */
function update_postopcare_admin_columns( $columns ) {
	unset( $columns['author'] );
	return $columns;
}
