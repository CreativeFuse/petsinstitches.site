<?php
/**
 * Custom Post Type Helper
 *
 * @package        CreativeFuse\Helpers
 * @since        0.0.1
 * @author        nvwd
 * @license        GNU-2.0+
 */

namespace CreativeFuse\Helpers;

add_action( 'init', __NAMESPACE__ . '\register_custom_post_types' );

function register_custom_post_types() {
	$cpt_configs = array();

	$cpt_configs = (array) apply_filters( 'add_custom_post_type_config', $cpt_configs );

	foreach ( $cpt_configs AS $post_type => $config ) {
		register_custom_post_type( $post_type, $config );
	}
}

function register_custom_post_type( $post_type, array $config ) {
	$args = $config['args'];

	if ( empty( $args['supports'] ) ) {
		$args['supports'] = generate_supported_post_type_features( $config['features'] );
	}

	if ( empty( $args['labels'] ) ) {
		$args['labels'] = generate_custom_labels( $config['labels'] );
	}

	register_post_type( $post_type, $args );
}

function generate_supported_post_type_features( array $features ) {
	$base_post_type_features = get_all_post_type_supports( $features['base_post_type'] );

	$supported_features = exclude_post_type_features( $base_post_type_features, $features['exclude'] );

	$supported_features = merge_post_type_features( $supported_features, $features['additional'] );

	return $supported_features;
}

function exclude_post_type_features( array $supported_features, $exclude_features ) {
	if ( empty( $exclude_features ) ) {
		return array_keys( $supported_features );
	}

	$features = array();

	foreach ( $supported_features AS $feature => $value ) {
		if ( in_array( $feature, $exclude_features ) ) {
			continue;
		}

		$features[] = $feature;
	}

	return $features;
}

function merge_post_type_features( array $supported_features, $additional_features ) {
	if ( empty( $additional_features ) ) {
		return $supported_features;
	}

	return array_merge( $supported_features, $additional_features );
}
