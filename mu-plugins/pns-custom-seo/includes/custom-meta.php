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

	// Force Services Titles
	
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

	//Force Services Description

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

	// Force Opengraph Img for Services
	add_filter( 'wpseo_opengraph_image', 'pns_force_services_seo_img', 1);

	function pns_force_services_seo_img( $img ){

			$currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


			// Dogs
			
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/dogs/') ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-services-dog-hero.jpg";
			}

			// Cats
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/cats/') ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-services-cat-hero.jpg";
			}	

			// Rabits
			if( is_post_type_archive( 'service' ) && strpos( $currentUrl, '/rabbits/') ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-services-rabbit-hero.jpg";
			}	
			
			return $img;

	}

	// Force Opengraph Img for Testimonials
	add_filter( 'wpseo_opengraph_image', 'pns_force_testimonials_seo_img', 1);

	function pns_force_testimonials_seo_img( $img ){

			$currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

			// Testimonials Landing
			if( $_SERVER['REQUEST_URI'] === '/testimonials/' ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-partners-hero.jpg";
			}

			// Dogs
			if( is_post_type_archive( 'testimonials' ) && strpos( $currentUrl, '/dogs/') ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-testmonial-dog-hero.jpg";
			}

			// Cats
			if( is_post_type_archive( 'testimonials' ) && strpos( $currentUrl, '/cats/') ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-testimonial-cat-hero.jpg";
			}	

			// Rabits
			if( is_post_type_archive( 'testimonials' ) && strpos( $currentUrl, '/rabbits/') ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-testmonial-rabbit-hero.jpg";
			}	
			
			return $img;

	}

	// Force Opengraph Img for partners
	add_filter( 'wpseo_opengraph_image', 'pns_force_partners_seo_img', 1);

	function pns_force_partners_seo_img( $img ){

			$currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

			// Testimonials Landing
			if( $_SERVER['REQUEST_URI'] === '/partners/' ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-partners-hero.jpg";
			}
			
			return $img;

	}

	// Force Opengraph Img for FAQs
	add_filter( 'wpseo_opengraph_image', 'pns_force_faq_seo_img', 1);

	function pns_force_faq_seo_img( $img ){

			$currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

			// Testimonials Landing
			if( $_SERVER['REQUEST_URI'] === '/faqs/' ){
				$img = "https://petsinstitches.com/wp-content/uploads/2017/08/pets-in-stitches-faqs-hero.jpg";
			}
			
			return $img;

	}