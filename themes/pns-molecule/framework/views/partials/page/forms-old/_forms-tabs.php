<?php

/**
 * Forms • Tabs
 *
 * Our tabs exist as a cohesive unit with each
 * tab linking to a different content panel
 * 
 * @using http://tabtab.be/
 *
 */

$tabs = array(

	'Dogs',
	'Cats',
	'Rabbits',
	'Free-Roaming Cats'
);

?>

<div id="forms-nav" class="c-tabs">

	<nav class="c-nav--secondary c-tabs__nav u-gradient--blue">

		<ul class="c-menu c-menu--secondary c-tabs__menu">

			<?php
				foreach ( $tabs AS $tab ) {
					
					/**
					 * Pull in the loop of tab menu items, which populates based
					 * on available Forms tabs
					 */

					Molecule_Router::render( 'page/forms', '_forms', 'menu__items', $tab );
					
				}

			?>

		</ul>

	</nav>

	<div class="c-tabs__panels">

		<?php
				foreach ( $tabs AS $tab ) {
										

					Molecule_Router::render( 'page/forms', '_forms', 'section__pet', $tab );

				}

			?>


	</div>

</div>