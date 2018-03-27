
<?php
/**
 * Template • Getting Started
 *
 * The template file to render all parts of the 
 * Getting Started Page
 */

// Intro Section after hero image
?>

<div itemscope itemtype="http://schema.org/ScheduleAction">

	<meta itemprop="name" content="Request an Appointment" />
	<meta itemprop="mainEntityOfPage url" content="<?php echo esc_url( get_the_permalink() ); ?>" />

	<?php
	Molecule_Router::render( 'page/request-appointment', '_request-appointment', 'intro');

	Molecule_Router::render( 'page/request-appointment', '_request-appointment', 'form');
	?>

</div>