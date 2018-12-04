<?php
/**
 * HEADER.PHP
 *
 * Our main site header is built using different "views" which  is fancy talk for components.
 * The views work by looking in the views folder in FRAMEWORK/VIEWS/.
 * We use the function cfi_get_view() which builds on get_template part.
 * This functions exists in FRAMEWORK/FUNCTIONS/HELPERS.PHP
 *
 * @since 1.0
 * @author CreativeFuse
 * @package wordpress
 */
?>

<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<?php // Render the site head ?>
	<?php Molecule_Router::render( 'core', '_site', 'head' ); ?>


	<?php // Open the body and #top.site tags ?>
	<?php Molecule_Router::render( 'core', '_site', 'top' ); ?>



		<?php
		/**
		 * Load site header and navigation bars as long as we
		 * are not using a landing page template.
		 */

		if( ! is_page_template( 'templates/landing.php' ) ){

		?>

			<header class="o-header" role="banner">

				<?php Molecule_Router::render( 'core', '_topbar', 'site' ) ?>
				<?php Molecule_Router::render( 'core', '_navbar', 'primary' ) ?>

				<?php Molecule_Router::render( 'object/mobile-menu', 'mobile-menu', 'main' ) ?>

			</header>

		<?php } ?>


		<?php do_action( 'molecule_before_main_begins' ); ?>


		<div class="o-main" role="main">


			<?php


				do_action( 'molecule_after_main_begins' );


				/**
				 * load the Sticky Action Items
				 */

				Molecule_Router::render( 'component', '_sticky', 'action-panel' );

				/**
				 * Load the appropriate site hero view
				 */

				Molecule_Router::load_hero();