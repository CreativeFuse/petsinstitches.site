<?php
// =============================================================================
// FRAMEWORK/VIEWS/CORE/_FOOTER-CONTENT.PHP
// -----------------------------------------------------------------------------
// Contains the content for the footer
// no need for footer tags -those are handled in their own partials
// =============================================================================
?>

<div class="o-col-md-4">

	<div itemscope itemtype="http://schema.org/VeterinaryCare" class="o-footer__well">

		<h4 class="e-h4 o-footer__well__title u-color--white">
			<?php esc_html_e( 'Let\'s Connect' ); ?>
		</h4>

		<img itemprop="image" class="u-vis-hide c-nav__logo__img c-nav__logo__img--desktop" src="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'url', 'nav_logo_desktop'); ?>" alt="<?php echo Molecule_Router::get_img_meta( 'acf_options', 'alt', 'nav_logo_desktop'); ?>">

		<p class="e-p--large c-text-icon c-text-icon--phone">
			<p class="e-p--large u-color--blue-l">
				<span itemprop="name"><b>Pets in Stitches</b></span>
			</p>
			<a itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="c-menu__link u-color--blue-l" href="https://www.google.com/maps/place/Pets+In+Stitches/@39.6306803,-84.2302138,17z/data=!3m1!4b1!4m5!3m4!1s0x884089007e771bbd:0x70b4d22ce61cd225!8m2!3d39.6306803!4d-84.2280251" target="_blank">
				<span itemprop="streetAddress">8265 Springboro Pike</span>
				<br/>
				<span itemprop="addressLocality">Miamisburg</span>,
				<span itemprop="addressRegion">Ohio</span>
				<span itemprop="postalCode">45343</span>
			</a>
		</p>

		<p class="e-p--large c-text-icon">

			<?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-phone.svg' ); ?>
			<a class="c-menu__link u-color--blue-l" href="tel:937-630-3320"><span itemprop="telephone">937-630-3320</span></a>
			<br/>
			<?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-printer.svg' ); ?>
			<a class="c-menu__link u-color--blue-l" href="tel:937-630-3325"><span itemprop="faxNumber">937-630-3325</span></a>
		</p>

        <p>

			<a itemprop="sameAs" class="c-icon--social" href="https://www.facebook.com/PetsInStitches/" target="_blank"><?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-facebook.svg' ); ?></a>
            <a itemprop="sameAs" class="c-icon--social" href="https://www.youtube.com/user/PetsInStitchesClinic" target="_blank"><?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-youtube.svg' ); ?></a>
            <a itemprop="sameAs" class="c-icon--social" href="https://www.instagram.com/petsinstitches/?hl=en" target="_blank"><?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-instagram.svg' ); ?></a>
            <a itemprop="sameAs" class="c-icon--social" href="https://www.linkedin.com/company/pets-in-stitches-llc/" target="_blank"><?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-linkedin.svg' ); ?></a>

		</p>

	</div>

</div>

<div class="o-col-md-4">

	<div class="o-footer__well">

		<h4 class="e-h4 o-footer__well__title u-color--white">
			<?php esc_html_e( 'Quick Links' ); ?>
		</h4>

		<p class="o-footer__well__links u-color--blue-l">
			<a class="c-menu__link e-p--large u-color--blue-l" href="/request-appointment/">Request an Appointment</a></br>
			<a class="c-menu__link e-p--large u-color--blue-l" href="/getting-started/" data-event-origin="footer-nav">Getting Started</a></br>
			<a class="c-menu__link e-p--large u-color--blue-l" href="/admission-form/">Admission Form</a></br>
			<a class="c-menu__link e-p--large u-color--blue-l" href="/blog/">Blog</a></br>
			<a class="c-menu__link e-p--large u-color--blue-l" href="/faqs/">FAQs</a>
		</p>


	</div>

</div>

<div class="o-col-md-4">

	<div class="o-footer__well">

		<h4 class="e-h4 o-footer__well__title u-color--white">
			<?php esc_html_e( 'We Love Animals' ); ?>
		</h4>

		<p class="e-p--large u-color--blue-l">
			Subscribe to our newsletter and we promise not to spam, unless of course your pet likes spam, ha!
		</p>

		<?php echo do_shortcode( '[mc4wp_form id="1613"]' ); ?>

	</div>

</div>
