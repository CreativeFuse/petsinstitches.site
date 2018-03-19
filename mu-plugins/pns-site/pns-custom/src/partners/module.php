<?php
/**
 * Partners Module Handler
 *
 * @package     CreativeFuse\PetsInStitches\Partners
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Partners;

define( 'PARTNERS_TEXT_DOMAIN', PNS_CUSTOM_TEXT_DOMAIN );
define( 'PARTNERS_MODULE_DIR', trailingslashit( __DIR__ ) );

add_filter( 'add_custom_post_type_config', __NAMESPACE__ . '\register_partner_configs' );
add_filter( 'add_custom_taxonomy_config', __NAMESPACE__ . '\register_partner_configs' );

/**
 * Register CPT and Custom Taxonomy config files
 *
 * @param array $configs
 *
 * @return array
 */
function register_partner_configs( array $configs ) {
	$doing_post_type = current_filter() == 'add_custom_post_type_config';

	$config_file = $doing_post_type
		? 'post-type'
		: 'taxonomy';

	$runtime_config = (array) require( PARTNERS_MODULE_DIR . '/' . $config_file . '.php' );

	if ( empty( $runtime_config ) ) {
		return $configs;
	}

	$key = $doing_post_type
		? $runtime_config['post_type']
		: $runtime_config['taxonomy'];

	$configs[ $key ] = $runtime_config;

	return $configs;
}

add_action( 'pre_get_posts', __NAMESPACE__ . '\get_all_partners' );

/**
 * modify partners main query to get all records
 *
 * @param $query
 */
function get_all_partners( $query ) {

	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'partners' ) ) {
		return;
	}

	$query->set( 'posts_per_page', - 1 );

	return;

}

add_action( 'restrict_manage_posts', __NAMESPACE__ . '\add_business_type_filter_to_admin_post_list' );

function add_business_type_filter_to_admin_post_list() {
	if ( empty( $_GET['post_type'] ) ) {
		return;
	}

	if ( 'partners' != $_GET['post_type'] ) {
		return;
	}

	$taxonomy_dropdown_args = array(
		'show_option_all' => 'All Business Types',
		'taxonomy'        => 'business_type',
		'orderby'         => 'name',
		'hide_empty'      => false,
		'name'            => 'business_type_filter',
		'selected'        => ( ! empty( $_GET['business_type_filter'] ) ) ? $_GET['business_type_filter'] : 0,
		'value_field'     => 'slug',
	);
	wp_dropdown_categories( $taxonomy_dropdown_args );
}

add_filter( 'pre_get_posts', __NAMESPACE__ . '\filter_by_business_type' );

function filter_by_business_type( $query ) {
	if ( ! is_admin() || empty( $_GET['business_type_filter'] ) || '0' === $_GET['business_type_filter'] ) {
		return;
	}
	$taxquery = array(
		'taxonomy' => 'business_type',
		'field'    => 'slug',
		'terms'    => $_GET['business_type_filter'],
	);

	$query->query_vars['tax_query'][] = $taxquery;
}

add_filter( 'pre_get_posts', __NAMESPACE__ . '\set_orderby_for_partners' );

function set_orderby_for_partners( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'partners' ) ) {
		return;
	}

	$query->set( 'orderby', 'menu_order' );
	$query->set( 'order', 'ASC' );
}

add_filter( 'manage_partners_posts_columns', __NAMESPACE__ . '\update_partner_admin_columns' );
/**
 * Remove author column
 *
 * @param $columns
 *
 * @return array    Modified array of column names
 */
function update_partner_admin_columns( $columns ) {
	unset( $columns['author'] );
	return $columns;
}
