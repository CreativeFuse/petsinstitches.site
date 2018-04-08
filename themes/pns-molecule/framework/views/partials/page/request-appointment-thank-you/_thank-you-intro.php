<?php
/**
 * Get ACF for home intro
 */

// Default Intro

$intro = 'We appreciate you requesting an appointment with us and will be in touch with you soon! At Pets In Stitches, we put the priority on the wellness of your pet. If you are interested in learning more about who we are and what our clinic is like, come with us on a tour of our facilities.';

?>


<div class="c-intro o-section u-gradient--blue u-arrow--bottom">
	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-text-block u-align--center">

					<p class="e-p--large u-color--white u-max-width--800 u-center">
						<?php esc_html_e( $intro ); ?>
					</p>

					<a class="c-btn c-btn--outline c-btn--white c-btn--hover-outline" href="/blog/take-a-tour/">

						<div class="c-btn__text">
							<?php esc_html_e( 'Take a Tour'); ?>
						</div>
						
					</a>

				</div>


			</div>
		</div>
	</div>
</div>