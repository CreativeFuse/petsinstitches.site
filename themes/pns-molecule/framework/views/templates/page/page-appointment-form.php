
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

	<meta itemprop="name" content="Admission Form" />
	<meta itemprop="mainEntityOfPage url" content="<?php echo esc_url( get_the_permalink() ); ?>" />

	<?php
		Molecule_Router::render( 'page/admission-form', '_admission-form', 'intro');

		Molecule_Router::render( 'page/admission-form', '_admission-form', 'form');

		// Molecule_Router::render( 'page/admission-form', '_admission-form', 'contact');

		Molecule_Router::render( 'page/admission-form', '_admission-form', 'home');
	?>

</div>