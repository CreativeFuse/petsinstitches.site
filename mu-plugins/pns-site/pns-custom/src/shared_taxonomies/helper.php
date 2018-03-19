<?php
/**
 * Shared Taxonomy Handler
 *
 * these taxonomies will be used by multiple CPTs
 *
 * @package        CreativeFuse\PetsInStitches
 * @since        0.0.1
 * @author        nvwd
 * @license        GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches;

define( 'SHARED_TAXONOMIES_TEXT_DOMAIN', PNS_CUSTOM_TEXT_DOMAIN );
define( 'SHARED_TAXONOMIES_MODULE_DIR', trailingslashit( __DIR__ ) );

add_filter( 'add_custom_taxonomy_config', __NAMESPACE__ . '\register_faq_configs', 15 );

function register_faq_configs( array $configs ) {
	$config_files = array(
		'animal',
	);

	foreach ( $config_files AS $config_file ) {
		$config_data = (array) require( SHARED_TAXONOMIES_MODULE_DIR . '/' . $config_file . '.php' );

		if ( ! empty( $config_data ) ) {
			$configs[ $config_data['taxonomy'] ] = $config_data;
		}
	}

	return $configs;
}

add_action( 'init', __NAMESPACE__ . '\add_animal_rewrite_tag', 20 );

/**
 * add animal rewrite tag to be used by CPTs custom rewrites
 */
function add_animal_rewrite_tag() {
	add_rewrite_tag( '%animal%', '([^/]*)' );
}

add_action( 'pre_get_posts', __NAMESPACE__ . '\set_animal_tax_query' );

/**
 * update the query for services and testimonials to include the animal query var
 *
 * @param $query
 */
function set_animal_tax_query( $query ) {

	if ( is_admin() || ! $query->is_main_query() || ( ! is_post_type_archive( 'service' ) && ! is_post_type_archive( 'testimonials' ) ) ) {
		return;
	}

	if ( empty( $query->query_vars['animal'] ) ) {
		return;
	}

	$taxquery = array(
		'taxonomy' => 'animal',
		'field'    => 'slug',
		'terms'    => $query->query_vars['animal'],
	);

	$query->query_vars['tax_query'][] = $taxquery;

}

add_action( 'restrict_manage_posts', __NAMESPACE__ . '\add_animal_filter_to_admin_post_list' );

function add_animal_filter_to_admin_post_list() {
	if ( empty( $_GET['post_type'] ) ) {
		return;
	}

	$animal_tax_properties = get_taxonomy('animal');

	if ( ! in_array( $_GET['post_type'], $animal_tax_properties->object_type ) ) {
		return;
	}

	$animal_dropdown_args = array(
		'show_option_all' => 'All Animals',
		'taxonomy'        => 'animal',
		'orderby'         => 'name',
		'hide_empty'      => false,
		'name'            => 'animal_filter',
		'selected'        => ( ! empty( $_GET['animal_filter'] ) ) ? $_GET['animal_filter'] : 0,
		'value_field'     => 'slug',
	);
	wp_dropdown_categories( $animal_dropdown_args );
}

add_filter( 'pre_get_posts', __NAMESPACE__ . '\filter_by_animal' );

function filter_by_animal( $query ) {
	if ( ! is_admin() || empty( $_GET['animal_filter'] ) || '0' === $_GET['animal_filter'] ) {
		return;
	}

	$taxquery = array(
		'taxonomy' => 'animal',
		'field'    => 'slug',
		'terms'    => $_GET['animal_filter'],
	);

	$query->query_vars['tax_query'][] = $taxquery;
}

add_action( 'wp', __NAMESPACE__ . '\check_animal_qv' );

function check_animal_qv() {
	$animal = get_query_var( 'animal', '' );
	if ( empty( $animal ) ) {
		return;
	}

	if ( ! term_exists( $animal, 'animal' ) ) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
	}
}
