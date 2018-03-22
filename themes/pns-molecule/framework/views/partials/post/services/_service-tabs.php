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
$animal = get_query_var( 'animal' );
$service_type = ucfirst( rtrim( $animal, 's' ) ) . ' Services';
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

	<div itemscope itemtype="http://schema.org/Service">

		<meta itemprop="serviceType" content="<?php echo $service_type; ?>" />

		<span itemprop="provider" itemscope itemtype="http://schema.org/VeterinaryCare">

			<meta itemprop="name" content="Pets in Stitches"/>

			<img itemprop="image" class="u-vis-hide c-nav__logo__img c-nav__logo__img--desktop" src="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'url', 'nav_logo_desktop' ); ?>" alt="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'alt', 'nav_logo_desktop' ); ?>">

		</span>
	
		<div itemprop="hasOfferCatalog" itemscope itemtype="http://schema.org/OfferCatalog" class="c-tabs__panels">
		
		<?php

			/**
			 * Pull in the loop of service panels, which populates based
			 * on available Service parent terms. These MUST populate
			 * in the same order as the Menu Items or the tab menu items will link
			 * to the wrong panel
			 */

			Molecule_Router::render( 'post/services', '_service', 'panels', $services );

		?>

		<!--
		Note: tabtab.js looks for the closestChild of c-tabs__panels.
		Because of this, any schema connected to the root OfferCatalog
		needs to be after the panel renders 
		-->
		<meta itemprop="numberOfItems" content="<?php echo( count( $services ) ); ?>" />

		</div>

	</div>

</div>