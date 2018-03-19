<?php
/*
Plugin Name: Pets In Stitches Custom
Plugin URI:  https://github.com/CreativeFuse/pns.custom-site-plugin.cfi101005
Description: Custom functionality, CPTs, and taxonomies for Pet In Stitches
Version:     0.0.1
Author:      nvwd
Author URI:  https://profiles.wordpress.org/nvwd
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: CFiPNS
Domain Path: /languages
*/

namespace CreativeFuse\PetsInStitches;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access to this file!' );
}

define( 'PNS_CUSTOM_PLUGIN', __FILE__ );
define( 'PNS_CUSTOM_DIR', trailingslashit( __DIR__ ) );
$plugin_url = plugin_dir_url( __FILE__ );
if ( is_ssl() ) {
	$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
}
define( 'PNS_CUSTOM_URL', $plugin_url );
define( 'PNS_CUSTOM_TEXT_DOMAIN', 'CFiPNS' );

include( __DIR__ . '/pns-custom/plugin.php' );
