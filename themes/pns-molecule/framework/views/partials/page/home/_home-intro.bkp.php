<?php
/**
 * Get ACF for home intro
 */

// Default Intro

$intro = 'Pets in Stitches invites you into an affordable, all-inclusive, spay and neuter clinic. We meet the needs of both you and your pet through our efficient yet nurturing process where you are kept well-informed and up-to-date from check-in to recovery. Your pet will experience our warm, inviting staff and will be cared for with love and respect. We are passionate about animals and believe that everyone should have the opportunity to high-quality pet care.';

if( get_field('home_intro') ){

	$intro = get_field( 'home_intro' );

}

?>


<div class="c-intro o-section u-gradient--blue u-arrow--bottom">
	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-text-block u-align--center">

					<p class="e-p--large u-color--white u-max-width--800 u-center">
						<?php esc_html_e( $intro ); ?>
					</p>

				</div>

			</div>
		</div>
	</div>
</div>
