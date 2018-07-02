<?php
/**
 * FAQ Module Handler
 *
 * @package     CreativeFuse\PetsInStitches\FAQ
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\FAQ;

define( 'FAQ_TEXT_DOMAIN', PNS_CUSTOM_TEXT_DOMAIN );
define( 'FAQ_MODULE_DIR', trailingslashit( __DIR__ ) );

add_filter( 'add_custom_post_type_config', __NAMESPACE__ . '\register_faq_configs' );
add_filter( 'add_custom_taxonomy_config', __NAMESPACE__ . '\register_faq_configs' );

/**
 * Register CPT and Custom Taxonomy config files
 *
 * @param array $configs
 *
 * @return array
 */
function register_faq_configs( array $configs ) {
	$doing_post_type = current_filter() == 'add_custom_post_type_config';

	$config_file = $doing_post_type
		? 'post-type'
		: 'taxonomy';

	$runtime_config = (array) require( FAQ_MODULE_DIR . '/' . $config_file . '.php' );

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
 * to call this from a template: $var_name = CreativeFuse\PetsInStitches\FAQ\get_faqs()
 *
 * @return array
 */
function get_faqs() {
	$faq_records = get_faqs_grouped_by_topic();

	$grouped_faqs = array();

	foreach ( $faq_records AS $faq ) {
		$topic_id = (int) $faq->term_id;
		$faq_id   = (int) $faq->post_id;

		if ( ! array_key_exists( $topic_id, $grouped_faqs ) ) {
			$grouped_faqs[ $topic_id ] = array(
				'topic_id'          => $topic_id,
				'topic_name'        => $faq->term_name,
				'topic_description' => $faq->description,
				'topic_slug'        => $faq->term_slug,
				'faqs'              => array(),
			);
		}

		$grouped_faqs[ $topic_id ]['faqs'][ $faq_id ] = array(
			'faq_id'      => $faq_id,
			'faq_title'   => $faq->post_title,
			'faq_content' => $faq->post_content,
			'faq_order'   => $faq->menu_order,
		);
	}

	return $grouped_faqs;

}

/**
 * custom query to pull all FAQs grouping them by topic
 *
 * @return array|bool
 */
function get_faqs_grouped_by_topic() {
	global $wpdb;

	$faq_query = "SELECT t.term_id, t.name AS term_name, t.slug AS term_slug, tt.description, p.ID AS post_id, p.post_title, p.post_content, p.menu_order
FROM {$wpdb->term_taxonomy} AS tt
INNER JOIN {$wpdb->terms} AS t ON (tt.term_id = t.term_id)
INNER JOIN {$wpdb->term_relationships} AS tr ON (tt.term_taxonomy_id = tr.term_taxonomy_id)
INNER JOIN {$wpdb->posts} AS p ON (tr.object_id = p.ID)
WHERE p.post_status = 'publish' AND p.post_type = %s AND tt.taxonomy = %s
GROUP BY t.term_id, p.ID
ORDER BY tt.order, t.term_id, p.menu_order ASC;";

	$faq_query = $wpdb->prepare( $faq_query, 'faqs', 'topic' );

	$results = $wpdb->get_results( $faq_query );

	if ( ! $results || ! is_array( $results ) ) {
		return false;
	}

	return $results;
}

/**
 * get all Postoperative FAQs for animal type (name)
 * 
 * to call this from a template: $var_name = CreativeFuse\PetsInStitches\FAQ\get_faqs_for_postop( $animal )
 * 
 * @param $animal
 * 
 * @return object
 */
function get_faqs_for_postop( $animal ) {

	/**
	 * Query for the animal name that
	 * is under the 'postoperative-care'
	 * term parent.
	 */
	$args = array(
		'post_type' => 'faqs',
		'tax_query' => array(
			array (
				'taxonomy' => 'topic',
				'field' => 'name',
				'terms' => $animal,
			),
			array (
				'taxonomy' => 'topic',
				'field' => 'slug',
				'terms' => 'postoperative-care',
				'operator' => 'IN'
			)
		),
	);

	$query = new \WP_Query( $args );
	return $query;

}

add_action( 'restrict_manage_posts', __NAMESPACE__ . '\add_topic_filter_to_admin_post_list' );

function add_topic_filter_to_admin_post_list() {
	if ( empty( $_GET['post_type'] ) ) {
		return;
	}

	if ( 'faq' != $_GET['post_type'] ) {
		return;
	}

	$taxonomy_dropdown_args = array(
		'show_option_all' => 'All Topics',
		'taxonomy'        => 'topic',
		'orderby'         => 'name',
		'hide_empty'      => false,
		'name'            => 'topic_filter',
		'selected'        => ( ! empty( $_GET['topic_filter'] ) ) ? $_GET['topic_filter'] : 0,
		'value_field'     => 'slug',
	);
	wp_dropdown_categories( $taxonomy_dropdown_args );
}

add_filter( 'pre_get_posts', __NAMESPACE__ . '\filter_by_topic' );

function filter_by_topic( $query ) {
	if ( ! is_admin() || empty( $_GET['topic_filter'] ) || '0' === $_GET['topic_filter'] ) {
		return;
	}
	$taxquery = array(
		'taxonomy' => 'topic',
		'field'    => 'slug',
		'terms'    => $_GET['topic_filter'],
	);

	$query->query_vars['tax_query'][] = $taxquery;
}

add_filter( 'manage_faqs_posts_columns', __NAMESPACE__ . '\update_faq_admin_columns' );
/**
 * Remove author column
 *
 * @param $columns
 *
 * @return array    Modified array of column names
 */
function update_faq_admin_columns( $columns ) {
	unset( $columns['author'] );
	return $columns;
}
