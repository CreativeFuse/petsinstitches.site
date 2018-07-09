<?php

/**
 * Post Operative • Tabs
 *
 * Our tabs exist as a cohesive unit with each
 * tab linking to a different content panel
 * 
 * @using http://tabtab.be/
 *
 */

$tabs = array(

	'female',
	'male',
	'faqs',
	'blogs'

);

?>

<div id="post-op-nav" class="c-tabs">

	<nav class="c-nav--secondary c-tabs__nav u-gradient--blue">

		<ul class="c-menu c-menu--secondary c-tabs__menu">

			<?php
				foreach ( $tabs AS $tab ) {
					
					/**
					 * Pull in the loop of tab menu items, which populates based
					 * on available Post Op tabs
					 */

					Molecule_Router::render( 'page/post-op', '_post-op', 'menu__items', $tab );
					
				}

			?>

		</ul>

	</nav>

	<div class="c-tabs__panels">

		<?php
				foreach ( $tabs AS $tab ) {
					
					/**
					 * Pull in the loop of tab menu items, which populates based
					 * on available Post Op tabs
					 */

					if ($tab == 'female' || $tab == 'male') {

						Molecule_Router::render( 'page/post-op', '_post-op', 'panel__gender', $tab );

					} else if ($tab == 'faqs') {

						Molecule_Router::render( 'page/post-op', '_post-op', 'panel__faqs');

					} else if ($tab == 'blogs') {

						Molecule_Router::render( 'page/post-op', '_post-op', 'panel__blogs');

					}

				}

			?>

	</div>

</div>