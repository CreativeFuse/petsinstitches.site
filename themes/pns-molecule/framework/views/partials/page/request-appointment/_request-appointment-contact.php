<?php

$address_street = get_field('address_street', 'option');
$address_city = get_field('address_city', 'option');
$address_state = get_field('address_state', 'option');
$address_zip = get_field('address_zip', 'option');
$phone_number = get_field('phone_number', 'option');
$email = get_field('email', 'option');
$opening_hours = get_field('opening_hours', 'option');

?>
<div class="o-section o-section--apt-request-contact">

	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-6">

				<div class="c-title-group c-title-group--contact">

					<h2 class="c-title-group__title e-h6 u-color--blue u-text-up">
						<?php esc_html_e( 'Address' ); ?>
					</h2>

					<p class="c-title-group__sub e-p--common">
						<a class="c-text-link u-color--gray" href="https://www.google.com/maps/dir//Pets+In+Stitches,+8265+N+Springboro+Pike,+Miamisburg,+OH+45342/@39.6307064,-84.2302008,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x884089007e771bbd:0x70b4d22ce61cd225!2m2!1d-84.2280121!2d39.6307064" target="_blank">
							<span itemprop="streetAddress"><?php esc_html_e( $address_street ); ?></span>
							<br/>
							<span itemprop="addressLocality"><?php esc_html_e( $address_city ); ?></span>,
							<span itemprop="addressRegion"><?php esc_html_e( $address_state ); ?></span>
							<span itemprop="postalCode"><?php esc_html_e( $address_zip ); ?></span>
                        </a>
					</p>

				</div>

				<div class="c-title-group c-title-group--contact">

					<p class="c-title-group__title e-p--common">

						<strong class="u-color--blue">Phone:</strong> <a class="c-text-link u-color--gray" href="tel:<?php esc_html_e( $phone_number ); ?>"><span itemprop="telephone"><?php esc_html_e( $phone_number ); ?></span></a>
						<br/>
						<strong class="u-color--blue">Email:</strong> <a class="c-text-link u-color--gray" href="mailto:<?php esc_html_e( $email ); ?>"><span itemprop="email"><?php esc_html_e( $email ); ?></span></a>

					</h2>


				</div>


				<div class="c-title-group c-title-group--contact">

					<h2 class="c-title-group__title e-h6 u-color--blue u-text-up">
						<?php esc_html_e( 'Hours' ); ?>
					</h2>

					<meta itemprop="openingHours" content="Mo-Th 7:30-17:00" />

					<p class="c-title-group__sub e-p--common">
						<?php echo wp_kses_post( $opening_hours ); ?>
					</p>

				</div>


			</div>

			<div class="o-col-md-6">

				<a class="c-map" href="https://www.google.com/maps/place/Pets+In+Stitches/@39.6306803,-84.2302138,17z/data=!3m1!4b1!4m5!3m4!1s0x884089007e771bbd:0x70b4d22ce61cd225!8m2!3d39.6306803!4d-84.2280251" target="_blank">
					<img src="/wp-content/uploads/2018/12/pets-in-stitches-request-an-appointment-map-img.png" alt="An image of the map location for Pets in Stitches that links to Google Maps">
				</a>
			</div>

		</div>
	</div>
</div>
