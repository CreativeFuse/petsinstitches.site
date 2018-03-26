
<?php
/**
 * Template • Getting Started
 *
 * The template file to render all parts of the 
 * Getting Started Page
 */
?>

<div itemscope itemtype="http://schema.org/ContactPage">

	<meta itemprop="articleSection" content="<?php $c = get_the_category(); echo esc_html( $c[0]->name ); ?>" />

	<meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>" />

	<meta itemprop="dateModified" content="<?php echo the_modified_date('c'); ?>" />

	<meta itemprop="mainEntityOfPage url" content="<?php echo esc_url( the_permalink() ); ?>" />

	<meta itemprop="isFamilyFriendly" content="True" />

	<span itemprop="author publisher" itemscope itemtype="http://schema.org/Organization">

		<meta itemprop="name" content="Pets in Stitches"/>

		<span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">

			<img itemprop="url" class="u-vis-hide c-nav__logo__img c-nav__logo__img--desktop" src="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'url', 'nav_logo_desktop' ); ?>" alt="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'alt', 'nav_logo_desktop' ); ?>">

		</span>

	</span>

	<?php
	Molecule_Router::render( 'page/contact', '_contact', 'intro');
	Molecule_Router::render( 'page/contact', '_contact', 'info');
	Molecule_Router::render( 'page/contact', '_contact', 'form');
	?>

</div>