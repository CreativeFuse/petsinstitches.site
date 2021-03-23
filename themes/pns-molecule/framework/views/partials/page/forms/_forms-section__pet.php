<div id="panel--<?php esc_html_e( $panel_class ); ?>" class="o-panel o-panel--post">

	<div class="o-panel__header o-container o-container--max" style="padding: 25px 0;">

		<div class="o-section o-section--sub-page" style="padding:0 0 80px;">

			<div class="o-row o-row__tee-up">

				<div class="o-col-md-12">
					
				<ul class="c-list-paws c-list-paws--blue">
					<?php $intro = get_field( 'intro'); ?>
					<li class="e-p--common c-list-paws__item u-max-width--900"><?= $intro; ?></li>
				</ul>
				
				<?php

				$card_sections = get_field( 'cards' );

				if( $card_sections ){ ?>

					<div class="o-row o-row--sub-page p-forms__row">

						<div class="o-col-md-12">
							<div class="c-collection--download-cards">
								<?php foreach( $card_sections as $section ){ ?>
									<!-- Display each available card -->
									<?php 
										$card_link = esc_url( $section['page_link'] );
										$card_link_attribute = esc_html( $section['link_target_attribute'] ); 
										$card_title = esc_html( $section['title'] );
										$card_content = esc_html( $section['content'] );
										$card_button_text = esc_html( $section['button_text'] );
										$card_icon = esc_html( $section['icon'] );

									?>

									<div class="c-download-card__item">

										<a class="c-download-card" href="<?= $card_link; ?>" target="<?= $card_link_attribute; ?>">

											<div class="c-download-card__header">
												<?= Molecule_Display::svg( $card_icon, 'form-bg' ); ?>
											</div>
											<div class="c-download-card__body">
												<h4 class="e-p--large c-download-card__title"><strong><?= $card_title; ?></strong></h4>
												<p class="e-p--common c-download-card__copy">
													<?= $card_content; ?>
												</p>
											</div>

											<div class="c-download-card__footer">
												<p class="e-p--common c-download-card__download-text">
													<strong><?= $card_button_text; ?></strong>
												</p>
											</div>

										</a>

									</div>
								<?php } ?>
							</div>

						</div>

					</div>

				<?php } ?>
		</div>

	</div>

</div>
