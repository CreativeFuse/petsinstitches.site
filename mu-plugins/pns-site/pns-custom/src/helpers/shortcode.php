<?php
/**
 * Shortcode Helper
 *
 * @package        CreativeFuse\Helpers
 * @since        0.0.1
 * @author        nvwd
 * @license        GNU-2.0+
 */

namespace CreativeFuse\Helpers;

function register_shortcode( $config_path ) {
	if ( ! is_readable( $config_path ) ) {
		return false;
	}
	$config = (array) include( $config_path );
	$config = array_merge(
		array(
			'shortcode_name'              => '',
			'do_shortcode_within_content' => true,
			'processing_function'         => null,
			'view'                        => '',
			'defaults'                    => array(),
		),
		$config
	);

	if ( ! $config['shortcode_name'] ) {
		return false;
	}

	add_shortcode( $config['shortcode_name'], __NAMESPACE__ . '\process_shortcode_callback' );

	return store_shortcode_configs( $config['shortcode_name'], $config );
}

function process_shortcode_callback( $instance_args, $content, $shortcode_name ) {
	$config = get_shortcode_configs( $shortcode_name );

	$attributes = shortcode_atts(
		$config['defaults'],
		$instance_args,
		$shortcode_name
	);

	if ( $content && $config['do_shortcode_within_content'] ) {
		$content = do_shortcode( $content );
	}
	if ( ! $config['processing_function'] ) {
		return "No shortcode process function defined for " . $shortcode_name . ".";
	}

	$function_name = $config['processing_function'];

	return $function_name( $config, $attributes, $content, $shortcode_name );
}

function get_shortcode_configs( $shortcode_name ) {
	return _shortcode_config_store( $shortcode_name );
}

function store_shortcode_configs( $shortcode_name, $config ) {
	return _shortcode_config_store( $shortcode_name, $config );
}

function _shortcode_config_store( $shortcode_name, $config = false ) {
	static $shortcode_configs = array();

	if ( ! isset( $shortcode_configs[ $shortcode_name ] ) ) {
		$shortcode_configs[ $shortcode_name ] = $config;
	}

	return $shortcode_configs[ $shortcode_name ];
}