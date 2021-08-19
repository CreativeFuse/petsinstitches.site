<?php
/**
 * Get ACF for home intro
 */

// Default Intro

// $intro = 'Pets in Stitches invites you into an affordable, all-inclusive, spay and neuter clinic. We meet the needs of both you and your pet through our efficient yet nurturing process where you are kept well-informed and up-to-date from check-in to recovery. Your pet will experience our warm, inviting staff and will be cared for with love and respect. We are passionate about animals and believe that everyone should have the opportunity to high-quality pet care.';

	if( get_field('home_intro') ){
		$intro = get_field( 'home_intro' );
	}

	$rows = get_field('hero_section' );
	if( $rows ) {
	    $index = array_rand( $rows );
	    $rand_row = $rows[ $index ];
		$class = ($rand_row['reverse_layout']) ? 'reverse' : '';
	}
?>

<div class="o-hero o-hero--home <?php echo esc_html_e($class); ?>" style="background-image:url( <?php echo esc_url($rand_row['background_image']); ?>)">

	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-4 o-col-sm-6 o-col-xs-12 hero-content">

				<div class="c-title-group c-title-group--hero">

					<h1 class="e-h1 c-title-group__title u-color--blue"><?php esc_html_e($rand_row['header']); ?></h1>

					<p class="e-p--common c-title-group__sub"><?php esc_html_e($rand_row['intro']); ?></p>

					<a class="c-btn c-btn--fill c-btn--purple c-btn--hover-outline c-title-group__btn" href="<?php echo esc_url($rand_row['button_link'] )  ?>" data-event-origin="home-hero-button">

						<div class="c-btn__text">
							<?php esc_html_e( $rand_row['button_text'] ); ?>
						</div>

					</a>

				</div>

			</div>
			<div class="o-col-md-8 o-col-sm-6 o-col-xs-12"></div>
		</div>

	</div>
</div>
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