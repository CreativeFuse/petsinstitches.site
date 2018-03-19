<?php

/**
 * Services • Tabs
 *
 * Our tabs exist as a cohesive unit with each
 * tab linking to a different content panel
 * 
 * @using http://tabtab.be/
 *
 */

$services = CreativeFuse\PetsInStitches\Services\get_animal_services();
?>

<div id="services-nav" class="c-tabs">

	<nav class="c-nav--secondary c-tabs__nav u-gradient--blue">

		<ul class="c-menu c-menu--secondary c-tabs__menu">

			<?php
				foreach ( $services AS $service ) {
					
					/**
					 * Pull in the loop of tab menu items, which populates based
					 * on available Service parent terms
					 */

					Molecule_Router::render( 'post/services', '_service', 'menu__items', $service );
					
				}

			?>

		</ul>

	</nav>

	<div class="c-tabs__panels">

		<?php

			/**
			 * Pull in the loop of service panels, which populates based
			 * on available Service parent terms. These MUST populate
			 * in the same order as the Menu Items or the tab menu items will link
			 * to the wrong panel
			 */

			Molecule_Router::render( 'post/services', '_service', 'panels', $services );

		?>

	</div>

</div>