<?php
// =============================================================================
// FRAMEWORK/VIEWS/CORE/_SITE-HEAD.PHP
// -----------------------------------------------------------------------------
// Contians the site <head>
// =============================================================================
?>

<head>
	<title><?php echo wp_title(); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>