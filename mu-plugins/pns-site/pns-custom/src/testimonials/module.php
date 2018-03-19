<?php
/**
 * Testimonials Module Handler
 *
 * @package     CreativeFuse\PetsInStitches\Testimonials
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace CreativeFuse\PetsInStitches\Testimonials;

define( 'TESTIMONIAL_TEXT_DOMAIN', PNS_CUSTOM_TEXT_DOMAIN );
define( 'TESTIMONIAL_MODULE_DIR', trailingslashit( __DIR__ ) );

add_filter( 'add_custom_post_type_config', __NAMESPACE__ . '\register_testimonial_configs' );
// add_filter( 'add_custom_taxonomy_config', __NAMESPACE__ . '\register_testimonial_configs' );

function register_testimonial_configs( array $configs ) {
	$doing_post_type = current_filter() == 'add_custom_post_type_config';

	$config_file = $doing_post_type
		? 'post-type'
		: 'taxonomy';

	$runtime_config = (array) require( TESTIMONIAL_MODULE_DIR . '/' . $config_file . '.php' );

	if ( empty( $runtime_config ) ) {
		return $configs;
	}

	$key = $doing_post_type
		? $runtime_config['post_type']
		: $runtime_config['taxonomy'];

	$configs[ $key ] = $runtime_config;

	return $configs;
}

function autoload() {
	$files = array(
		'shortcode.php',
	);
	foreach ( $files AS $file ) {
		include( __DIR__ . '/' . $file );
	}
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\setup_module' );

function setup_module() {
	\CreativeFuse\Helpers\register_shortcode( TESTIMONIAL_MODULE_DIR . 'shortcode-config.php' );
}

autoload();

add_action( 'init', __NAMESPACE__ . '\update_testimonial_animal_rewrite_rules' );

/**
 *  Create custom rewrite rules to handle the testimonial/{animal} and testimonial/{animal}/page/{page_num}/ urls properly
 */
function update_testimonial_animal_rewrite_rules() {

	add_rewrite_rule( 'testimonials/([^/]*)/page/([0-9]{1,})/?$', 'index.php?animal=$matches[1]&post_type=testimonials&paged=$matches[2]', 'top' );
	add_rewrite_rule( 'testimonials/([^/]*)[/]?', 'index.php?animal=$matches[1]&post_type=testimonials', 'top' );

}

add_filter( 'pre_get_posts', __NAMESPACE__ . '\set_orderby_for_testimonials' );

function set_orderby_for_testimonials( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'testimonials' ) ) {
		return;
	}

	$query->set( 'orderby', 'menu_order' );
	$query->set( 'order', 'ASC' );
}

add_filter( 'manage_testimonials_posts_columns', __NAMESPACE__ . '\update_testimonial_admin_columns' );
/**
 * Remove author column and add one for the ACF testimonial_name field
 *
 * @param $columns
 *
 * @return array    Modified array of column names
 */
function update_testimonial_admin_columns( $columns ) {
	unset( $columns['author'] );
	$new_column_order = array();
	foreach ( $columns AS $key => $title ) {
		if ( 'taxonomy-animal' == $key ) {
			$new_column_order['testimonial_name'] = "Name";
			$new_column_order['testimonial_featured'] = "Featured";
		}
		$new_column_order[ $key ] = $title;
	}

	return $new_column_order;
}

add_action( 'manage_testimonials_posts_custom_column', __NAMESPACE__ . '\create_custom_admin_column_content', 10, 2 );
/**
 * get the content for the custom admin columns
 *
 * @param $column
 * @param $post_id
 */
function create_custom_admin_column_content( $column, $post_id ) {
	switch ( $column ) {
		case 'testimonial_name':
			$name = get_field( 'testimonial_name', $post_id );
			if ( $name ) {
				echo $name;
			} else {
				echo '';
			}
			break;
		case 'testimonial_featured':
			echo ( ! empty( get_field( 'testimonial_featured', $post_id ) ) ) ? 'Featured': '';
			break;
	}
}

