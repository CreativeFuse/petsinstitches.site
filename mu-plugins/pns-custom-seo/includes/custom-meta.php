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


/**
 * Do not output paginated canonicals on Testimonial pages as they are outputting improperly
 * due to custom URL rewriting
 */
add_filter( 'wpseo_next_rel_link', 'pns_disable_paginated_testimonial_canonical' );
add_filter( 'wpseo_prev_rel_link', 'pns_disable_paginated_testimonial_canonical' );

function pns_disable_paginated_testimonial_canonical( $link ){

		if( is_post_type_archive( 'testimonials' ) ){

			return false;

		} else {

			return $link;

		}

}


/**
 * Force Custom Meta Information for
 * all Services Pages -- It will not apply these
 * correctly by default due to URL rewriting
 */
	
	// Force Proper Canonical URLS
	add_filter( 'wpseo_canonical', 'pns_force_services_seo_canonical', 1);

	function pns_force_services_seo_canonical( $url ){

			$currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			
			if( is_post_type_archive( 'service' ) || is_post_type_archive( 'testimonials' ) ){
				$url = $currentUrl;
			}	

			return $url;

	}

	add_filter( 'wpseo_title', 'pns_force_services_seo_titles', 1);

	function pns_force_services_seo_titles( $title ){

			$currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

			// Dogs
			
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/dogs/') ){
				$title = "Health and Wellness Services For Dogs | Pets In Stitches";
			}	

			// Cats
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/cats/') ){
				$title = "Health and Wellness Services For Cats | Pets In Stitches";
			}	

			// Rabits
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/rabbits/') ){
				$title = "Health and Wellness Services For Rabbits | Pets In Stitches";
			}	
			
			return $title;

	}

	//add_filter( 'wpseo_metadesc', 'pns_force_services_seo_desc', 1);

	function pns_force_services_seo_desc( $desc ){

			$currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


			// Dogs
			
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/dogs/') ){
				$desc = "We offer a wide variety of services to support your dog's health and wellness.";
			}	

			// Cats
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/cats/') ){
				$desc = "We offer a wide variety of services to support your cat's health and wellness.";
			}	

			// Rabits
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/rabbits/') ){
				$desc = "We offer a wide variety of services to support your rabbit's health and wellness.";
			}	
			
			return $desc;

	}