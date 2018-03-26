<div itemscope itemtype="http://schema.org/VeterinaryCare" class="o-section p-about__staff o-section--sub-page">

	<div class="o-container o-container--max">

		<?php // Begin Staff Feed ?>
		<div class="o-row o-row--sub-page">

			<div class="o-col-md-12">

			<?php if( have_rows( 'staff' ) ){ ?>

				<div class="c-staff u-max-width--600 u-center">

				<?php while( have_rows( 'staff' ) ){

					the_row();

					// Each Staff Member
					

					// Define ACF Fields
					$name = get_sub_field( 'name' );
					$position = get_sub_field( 'position' );
					$photo = get_sub_field( 'photo' );
					$bio  = get_sub_field( 'bio' );

					?>

					<div itemprop="employee" itemscope itemtype="http://schema.org/Person" class="c-staff__member">

						<!-- Employee Headshot -->
						<div class="c-staff__headshot">
							<img itemprop="image" class="c-photo c-photo--standard" src="<?php echo esc_url( $photo['url'] ); ?>" alt="<?php echo esc_url( $photo['alt'] ); ?>"/>
						</div>


						<!-- Employee Info -->
						<div class="c-staff__info c-title-group c-title-group-1">

							<!-- Employee Name -->
							<h2 itemprop="name" class="e-h2 c-staff__info__name c-title-group__title u-color--blue">
								<?php echo esc_html( $name ); ?>
							</h2>

							<!-- Employee Position -->
							<h6 itemprop="jobTitle" class="e-h6 c-staff__info__position c-title-group__title">
								<?php echo esc_html( $position ); ?>
							</h6>

						</div>

					

						<!-- Employee Background -->
						<div class="c-staff__background c-accordion c-accordion--simple c-accordion--simple--1 js-expand-accordion u-max-width--700 u-center">

							<div class="c-accordion--simple__header u-clearfix">

								<h5 class="e-h6 c-accordion--simple__header__title u-text-up">
									<?php echo esc_html( 'View Bio' ); ?>
								</h5>

								<div class="c-accordion__icon c-accordion__icon--simple">

									<div class="c-accordion__icon-bar 
									c-accordion__icon-bar--1"></div>

									<div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>

								</div>

							</div>

							<div class="c-accordion--simple__body u-clearfix">
								
								<div itemprop="description" class="e-p--common"><?php echo wp_kses_post( $bio ); ?></div>

							</div>

						</div>

					</div>


				<?php } ?>

				</div>

			<?php } ?>


			</div>

		</div>

	</div>

</div>