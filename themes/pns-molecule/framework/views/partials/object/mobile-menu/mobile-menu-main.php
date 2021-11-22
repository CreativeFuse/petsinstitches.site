<?php

$address_street = get_field('address_street', 'option');
$address_city = get_field('address_city', 'option');
$address_state = get_field('address_state', 'option');
$address_zip = get_field('address_zip', 'option');
$phone_number = get_field('phone_number', 'option');
$opening_hours = get_field('opening_hours', 'option');
?>
<div class="o-mobile-menu">
	<div class="o-container">


		<div class="o-row">

			<div class="o-col-md-12">

				<ul class="o-mobile-menu__menu o-mobile-menu__accordion e-h4">

					<li class="o-mobile-menu__menu-item">
						<a class="o-mobile-menu__menu-item-toggle u-color--blue-l u-text-up" href="javascript:void(0);">About</a>

						<ul class="o-mobile-menu__menu o-mobile-menu__item-inner">

							<li class="o-mobile-menu__menu-item"><a href="/about/">Team</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/partners/">Partners</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/take-a-tour/">Take a Tour</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/faqs/">FAQs</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/testimonials/">Testimonials</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/getting-started">Getting Started</li></a>

						</ul>
					</li>


					<li class="o-mobile-menu__menu-item">
						<a class="o-mobile-menu__menu-item-toggle u-color--blue-l u-text-up" href="javascript:void(0);">Dogs</a>

						<ul class="o-mobile-menu__menu o-mobile-menu__item-inner">

							<li class="o-mobile-menu__menu-item"><a href="/services/dogs/">Services</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/postoperative-care/dogs/">Postoperative</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/forms/">Forms</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/faqs/">FAQs</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/alternative-sterilization/">Alternative Sterilization</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/testimonials/dogs/">Testimonials</li></a>

						</ul>

					</li>


					<li class="o-mobile-menu__menu-item">

						<a class="o-mobile-menu__menu-item-toggle u-color--blue-l u-text-up" href="javascript:void(0);">Cats</a>

						<ul class="o-mobile-menu__menu o-mobile-menu__item-inner">

							<li class="o-mobile-menu__menu-item"><a href="/services/cats/">Services</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/postoperative-care/cats">Postoperative</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/forms/">Forms</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/faqs/">FAQs</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/stray-cats/">Stray Cats</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/testimonials/cats/">Testimonials</li></a>

						</ul>

					</li>


					<li class="o-mobile-menu__menu-item">
						<a class="o-mobile-menu__menu-item-toggle u-color--blue-l u-text-up" href="javascript:void(0);">Rabbits</a>

						<ul class="o-mobile-menu__menu o-mobile-menu__item-inner">

							<li class="o-mobile-menu__menu-item"><a href="/services/rabbits/">Services</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/postoperative-care/rabbits/">Postoperative</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/forms/">Forms</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/faqs/">FAQs</li></a>
							<li class="o-mobile-menu__menu-item"><a href="/testimonials/rabbits/">Testimonials</li></a>

						</ul>

					</li>	


					<li class="o-mobile-menu__menu-item">

						<a class="u-color--blue-l u-text-up" href="/blog/">Blog</a>

					</li>

                    <li class="o-mobile-menu__menu-item">

						<a class="u-color--blue-l u-text-up" href="/contact/">Contact</a>

					</li>

                    <li class="o-mobile-menu__menu-item o-mobile-menu__top-nav">
                        
                        <a class="u-color--blue-l u-text-up" href="/request-appointment">Make An Appointment</a>

                    </li>

                    <li class="o-mobile-menu__menu-item o-mobile-menu__top-nav">
                        
                        <a class="u-color--blue-l u-text-up" href="/getting-started">Getting Started</a>

                    </li>

                    <li class="o-mobile-menu__menu-item o-mobile-menu__top-nav">
                        
                        <a class="u-color--blue-l u-text-up" href="/forms">Forms</a>

                    </li>
						
				</ul>


			</div>


			<div class="o-mobile-menu__contact-info">

                    
                    <p class="o-mobile-menu__contact-info--title">

                        <strong>Business Hours:</strong>

                    </p>


                    <div class="u-color--blue-l">

                        <?php echo wp_kses_post( $opening_hours ); ?>

                    </div>

			</div>


			<div class="o-mobile-menu__contact-info">

				<div class="o-mobile-menu__address">
					<p class="e-p--common u-color--blue-l">

						<a href="https://www.google.com/maps/place/Pets+In+Stitches/@39.6306803,-84.2302138,17z/data=!3m1!4b1!4m5!3m4!1s0x884089007e771bbd:0x70b4d22ce61cd225!8m2!3d39.6306803!4d-84.2280251" target="_blank" style="color:#c3ecfd;">
                            <span ><?php esc_html_e( $address_street ); ?></span>
							<br/>
							<span ><?php esc_html_e( $address_city ); ?></span>,
							<span ><?php esc_html_e( $address_state ); ?></span>
							<span ><?php esc_html_e( $address_zip ); ?></span>
                        </a>
					</p>

				</div>

			</div>


			<div class="o-mobile-menu__contact-info">


				<p class="e-p--common u-color--blue-l">

					<a href="tel:<?php esc_html_e( $phone_number ); ?>" style="color:#c3ecfd;"><?php esc_html_e( $phone_number ); ?></a>

				</p>

			</div>

            <div class="o-mobile-menu__contact-info">
            
                <a class="c-icon--social" href="https://www.facebook.com/PetsInStitches/" target="_blank"><?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-facebook.svg' ); ?></a>
                <a class="c-icon--social" href="https://www.youtube.com/user/PetsInStitchesClinic" target="_blank"><?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-youtube.svg' ); ?></a>
                <a class="c-icon--social" href="https://www.instagram.com/petsinstitches/?hl=en" target="_blank"><?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-instagram.svg' ); ?></a>
                <a class="c-icon--social" href="https://www.linkedin.com/company/pets-in-stitches-llc/" target="_blank"><?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-linkedin.svg' ); ?></a>
                
            </div>

		</div>

	</div>
</div>
<div class="c-icon--mobile">
  <span class="c-icon--mobile-spans"></span>
  <span class="c-icon--mobile-spans"></span>
  <span class="c-icon--mobile-spans"></span>
  <span class="c-icon--mobile-spans"></span>
</div>