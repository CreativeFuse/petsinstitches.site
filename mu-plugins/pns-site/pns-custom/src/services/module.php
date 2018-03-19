<?php
/**
 * Services Module Handler
 *
 * @package     CreativeFuse\PetsInStitches\Services
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Services;

define( 'SERVICES_TEXT_DOMAIN', PNS_CUSTOM_TEXT_DOMAIN );
define( 'SERVICES_MODULE_DIR', trailingslashit( __DIR__ ) );

add_filter( 'add_custom_post_type_config', __NAMESPACE__ . '\register_services_configs' );
add_filter( 'add_custom_taxonomy_config', __NAMESPACE__ . '\register_services_configs' );

/**
 * Register CPT and Custom Taxonomy config files
 *
 * @param array $configs
 *
 * @return array
 */
function register_services_configs( array $configs ) {
	$doing_post_type = current_filter() == 'add_custom_post_type_config';

	$post_type_files = array(
		'post-type'
	);

	$taxonomy_files = array(
		'taxonomies/type',
	);

	$config_files = $doing_post_type
		? $post_type_files
		: $taxonomy_files;

	foreach ( $config_files AS $config_file ) {
		$config_data = (array) require( SERVICES_MODULE_DIR . '/' . $config_file . '.php' );

		if ( ! empty( $config_data ) ) {
			$key = $doing_post_type ? $config_data['post_type'] : $config_data['taxonomy'];

			$configs[ $key ] = $config_data;
		}
	}

	return $configs;
}

add_action( 'init', __NAMESPACE__ . '\update_services_animal_rewrite_rules' );

/**
 *  Create a custom rewrite rule to handle the services/{animal} url properly
 */
function update_services_animal_rewrite_rules() {

	add_rewrite_rule( 'services/([^/]*)[/]?', 'index.php?animal=$matches[1]&post_type=service', 'top' );

}

add_action( 'pre_get_posts', __NAMESPACE__ . '\set_services_query' );

/**
 * update the query to get all services
 *
 * @param $query
 */
function set_services_query( $query ) {

	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'service' ) ) {
		return;
	}

	$query->set( 'posts_per_page', - 1 );

	return;

}

/**
 * get the specific animal services grouped by their type term
 *
 * to call this from a template: $var_name = CreativeFuse\PetsInStitches\Services\get_animal_services()
 *
 * @return array
 */
function get_animal_services() {
	global $posts;
	$specific_service_ids = wp_list_pluck( $posts, 'ID' );

	$grouped_services = array();

	$parent_service_types = get_terms( array( 'taxonomy' => 'type', 'parent' => 0 ) );

	foreach ( $parent_service_types AS $parent_type ) {

		$parent_id = (int) $parent_type->term_id;

		$grouped_services[ $parent_id ] = array(
			'term_id'          => $parent_id,
			'term_name'        => $parent_type->name,
			'term_slug'        => $parent_type->slug,
			'term_description' => $parent_type->description,
			'services'         => array(),
			'sub_types'        => array(),
		);
		$sub_type_services              = get_animal_services_grouped_by_type( $specific_service_ids, $parent_id );

		if ( ! $sub_type_services ) {
			continue;
		}
		foreach ( $sub_type_services AS $service ) {
			$service_id = (int) $service->post_id;
			$term_id    = (int) $service->term_id;

			if ( ! array_key_exists( $term_id, $grouped_services[ $parent_id ]['sub_types'] ) ) {
				$grouped_services[ $parent_id ]['sub_types'][ $term_id ] = array(
					'term_id'          => $term_id,
					'term_name'        => $service->term_name,
					'term_slug'        => $service->term_slug,
					'term_description' => $service->description,
					'services'         => array(),
				);
			}

			$grouped_services[ $parent_id ]['sub_types'][ $term_id ]['services'][ $service_id ] = array(
				'service_id'      => $service_id,
				'service_title'   => $service->post_title,
				'service_content' => $service->post_content,
				'menu_order'      => $service->menu_order,
			);
		}
	}

	return $grouped_services;
}

/**
 * custom query to pull animal services based on a list of service post_IDs and a specific type parent_id
 *
 * @param $specific_service_ids
 * @param $type_parent_id
 *
 * @return array|bool
 */
function get_animal_services_grouped_by_type( $specific_service_ids, $type_parent_id ) {
	global $wpdb;

	$id_format_string = rtrim( str_repeat( '%d,', count( $specific_service_ids ) ), ',' );

	$sql_vars = $specific_service_ids;

	$sql_vars[] = $type_parent_id;

	$sql_query = "SELECT t.term_id, t.name AS term_name, t.slug AS term_slug, tt.parent, tt.description, p.ID AS post_id, p.post_title, p.post_content, p.menu_order
	FROM {$wpdb->term_taxonomy} AS tt
	INNER JOIN {$wpdb->terms} AS t ON ( tt.term_id = t.term_id )
	INNER JOIN {$wpdb->term_relationships} AS tr ON ( tt.term_taxonomy_id = tr.term_taxonomy_id )
	INNER JOIN {$wpdb->posts} AS p ON ( tr.object_id = p.ID )
	WHERE p.ID IN ({$id_format_string}) AND tt.taxonomy = 'type' AND tt.parent = %d
	GROUP BY t.term_id, p.ID
	ORDER BY tt.order, t.term_id, p.menu_order ASC;";

	$sql_query = $wpdb->prepare( $sql_query, $sql_vars );

	$results = $wpdb->get_results( $sql_query );

	if ( ! $results || ! is_array( $results ) ) {
		return false;
	}

	return $results;
}

add_action( 'restrict_manage_posts', __NAMESPACE__ . '\add_type_filter_to_admin_post_list' );

function add_type_filter_to_admin_post_list() {
	if ( empty( $_GET['post_type'] ) ) {
		return;
	}

	if ( 'service' != $_GET['post_type'] ) {
		return;
	}

	$taxonomy_dropdown_args = array(
		'show_option_all' => 'All Types',
		'taxonomy'        => 'type',
		'orderby'         => 'name',
		'hide_empty'      => false,
		'name'            => 'type_filter',
		'selected'        => ( ! empty( $_GET['type_filter'] ) ) ? $_GET['type_filter'] : 0,
		'value_field'     => 'slug',
	);
	wp_dropdown_categories( $taxonomy_dropdown_args );
}

add_filter( 'pre_get_posts', __NAMESPACE__ . '\filter_by_type' );

function filter_by_type( $query ) {
	if ( ! is_admin() || empty( $_GET['type_filter'] ) || '0' === $_GET['type_filter'] ) {
		return;
	}

	$taxquery = array(
		'taxonomy' => 'type',
		'field'    => 'slug',
		'terms'    => $_GET['type_filter'],
	);

	$query->query_vars['tax_query'][] = $taxquery;

}

add_filter( 'manage_service_posts_columns', __NAMESPACE__ . '\update_service_admin_columns' );
/**
 * Remove author column
 *
 * @param $columns
 *
 * @return array    Modified array of column names
 */
function update_service_admin_columns( $columns ) {
	unset( $columns['author'] );

	$new_column_order = array();

	foreach ( $columns AS $key => $title ) {
		if ( 'date' == $key ) {
			$new_column_order['service_note'] = "Note";
		}
		$new_column_order[ $key ] = $title;
	}
	return $new_column_order;
}
// service_note
add_action( 'manage_service_posts_custom_column', __NAMESPACE__ . '\create_custom_admin_column_content', 10, 2 );
/**
 * get the content for the custom admin columns
 *
 * @param $column
 * @param $post_id
 */
function create_custom_admin_column_content( $column, $post_id ) {
	switch ( $column ) {
		case 'service_note':
			$note = get_field( 'service_note', $post_id );
			if ( $note ) {
				$field_object = get_field_object( 'service_note', $post_id );
				echo $field_object['choices'][$note];
			} else {
				echo '';
			}
			break;
	}
}

add_action( 'restrict_manage_posts', __NAMESPACE__ . '\add_service_note_filter_to_admin_post_list' );

function add_service_note_filter_to_admin_post_list() {
	if ( empty( $_GET['post_type'] ) || 'service' != $_GET['post_type'] ) {
		return;
	}

	global $wpdb;

	// get ACF field key
	// $note_cpt = get_posts( array( 'post_type' => 'acf-field', 'post_excerpt' => 'service_note', 'numberposts' => -1 ) );
	$note_cpt = $wpdb->get_results( "select post_name from {$wpdb->prefix}posts where post_type = 'acf-field' and post_excerpt = 'service_note'" );

	// get field detail to get choices
	$field = get_field_object( $note_cpt[0]->post_name );

	$choices = $field['choices'];
	?>
	<select name="service_note_filter" id="service_note_filter" class="postform">
	<option value="">All Notes</option>
	<?php
		$current_value = ( ! empty( $_GET['service_note_filter'] ) ) ? $_GET['service_note_filter'] : '';
		foreach ( $choices AS $key => $value ) {
			printf( '<option value="%s" %s>%s</option >', esc_attr( $key ), $key == $current_value ? 'selected="selected"' : '', esc_html( $value ) );
		}
	?>
	</select>
	<?php

}

add_filter( 'pre_get_posts', __NAMESPACE__ . '\filter_by_animal' );

function filter_by_animal( $query ) {
	if ( ! is_admin() || empty( $_GET['service_note_filter'] ) ) {
		return;
	}

	$metaquery = array(
		'key' => 'service_note',
		'value'    => $_GET['service_note_filter'],
	);

	$query->query_vars['meta_query'][] = $metaquery;
}
