<?php
// @ref https://gist.github.com/amboutwe/8cfb7a3d8f05e580867341d4ff84141d

/* Add External Sitemap to Yoast Sitemap Index
 * Credit: Paul https://wordpress.org/support/users/paulmighty/
 * Last Tested: Aug 25 2017 using Yoast SEO 5.3.2 on WordPress 4.8.1
 *********
 * This code adds three external sitemaps and must be modified before using.
 * Replace http://www.example.com/external-sitemap-#.xml
   with your external sitemap URL.
 * Replace 2017-05-22T23:12:27+00:00
   with the time and date your external sitemap was last updated.
   Format: yyyy-MM-dd'T'HH:mm:ssZ
 * If you have more/less sitemaps, add/remove the additional section.
 *********
 * Please note that changes will be applied upon next sitemap update.
 * To manually refresh the sitemap, please disable and enable the sitemaps.
 */


add_filter( 'wpseo_sitemap_index', 'add_sitemap_custom_items', 1 );

function add_sitemap_custom_items( $sitemap_custom_items ) {

	/**
	 * Pull in Testimonials Sitemap
	 */
   $sitemap_custom_items = '<sitemap>';
   	$sitemap_custom_items .= '<loc>https://petsinstitches.com/wp-content/mu-plugins/pns-custom-seo/sitemaps/testimonials-sitemap.xml</loc>';
   	$sitemap_custom_items .= '<lastmod>2018-03-18T23:12:28+00:00</lastmod>';
   $sitemap_custom_items .= '</sitemap>';

   /**
	 * Services Sitemap
	 */
   $sitemap_custom_items .= '<sitemap>';
   	$sitemap_custom_items .= '<loc>https://petsinstitches.com/wp-content/mu-plugins/pns-custom-seo/sitemaps/services-sitemap.xml</loc>';
   	$sitemap_custom_items .= '<lastmod>2018-03-18T23:12:28+00:00</lastmod>';
   $sitemap_custom_items .= '</sitemap>';


   /**
	 * Custom Pages Sitemap
	 */
   $sitemap_custom_items .= '<sitemap>';
   	$sitemap_custom_items .= '<loc>https://petsinstitches.com/wp-content/mu-plugins/pns-custom-seo/sitemaps/custom-pages-sitemap.xml</loc>';
   	$sitemap_custom_items .= '<lastmod>2018-03-18T23:12:27+00:00</lastmod>';
   $sitemap_custom_items .= '</sitemap>';


	/**
    * DO NOT REMOVE ANYTHING BELOW THIS LINE
	 * Send the information to Yoast SEO
	 */
	return $sitemap_custom_items;

}