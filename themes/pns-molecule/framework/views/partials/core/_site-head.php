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

	<?php wp_head(); ?>
</head>