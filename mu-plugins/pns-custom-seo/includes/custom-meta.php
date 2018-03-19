<?php
// @ref https://yoast.com/wordpress/plugins/seo/api/

/**
 * Force Indexing on pages that Yoast is defaulting
 * to noindex, nofollow due to custom URL rewrites
 */

add_filter( 'wpseo_robots', 'pns_force_index', 1);

function pns_force_index( $robots ){

		/**
		 * Only Force Indexing on Services Pages
		 */
		
		if( is_post_type_archive( 'service' ) ){
			$robots = "index, follow";
		}	

		
		return $robots;

}