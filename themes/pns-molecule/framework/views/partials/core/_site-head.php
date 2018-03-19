<?php
// =============================================================================
// FRAMEWORK/VIEWS/CORE/_SITE-HEAD.PHP
// -----------------------------------------------------------------------------
// Contians the site <head>
// =============================================================================
?>

<head>
	<title><?php echo wp_title(); ?></title>
	<?php // Block ODP Listings - @src https://moz.com/blog/why-wont-google-use-my-meta-description ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmCFi.org/xfn/11">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-57x57.png' ); ?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-60x60.png' ); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-72x72.png' ); ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-76x76.png' ); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-114x114.png' ); ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-120x120.png' ); ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-144x144.png' ); ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-152x152.png' ); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/apple-icon-180x180.png' ); ?>">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/android-icon-192x192.png' ); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/favicon-32x32.png' ); ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/favicon-96x96.png' ); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/favicon-16x16.png' ); ?>">
	<link rel="manifest" href="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/manifest.json' ); ?>">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo esc_url( molecule()->get_setting( 'img_path' ) . 'site-icons/ms-icon-144x144.png' ); ?>">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>