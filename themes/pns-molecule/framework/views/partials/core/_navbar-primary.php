<?php
// =============================================================================
// FRAMEWORK/VIEWS/CORE/_NAVBAR-MAIN.PHP
// -----------------------------------------------------------------------------
// If the primary meu exists, we will output it wherever this view is called
// =============================================================================
?>

<div class="o-navbar">
	<div class="o-navbar__inner o-container o-container--max o-container--width">


		<?php

		/**
		 * Load the Navbar Logo
		 */

		 Molecule_Router::render( 'component/logo', '_logo', 'navbar' ); ?>


		<a class="skip-link u-visually-hidden" href="#content"><?php esc_html_e( 'Skip to content', 'molecule' ); ?></a>


		<nav class="c-nav c-nav--primary u-pull--right u-clearfix" role="navigation">

			<?php
				
				/**
				 * Load the site's primary Menu
				 */

				if ( has_nav_menu( 'primary' ) ) {

					Molecule_Router::render( 'core', '_menu', 'primary' );

				} 


			?>

		</nav>

	</div>
</div><!-- #site-navigation -->