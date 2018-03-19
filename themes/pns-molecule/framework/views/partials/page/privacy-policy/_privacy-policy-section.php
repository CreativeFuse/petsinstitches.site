<?php

$page = 'privacy_policy';
$group = get_field( $page );

// If the grpoup has Data


if( $group ) { ?>
	
	<div class="o-section o-section--sub-page">

		<div class="o-container o-container--max">

			<div class="o-row o-row__tee-up">

				<div class="o-col-md-12">

					<div class="c-tile-group">

						<h2 class="e-h2 c-title-group__title u-color--blue"><?php esc_html_e( $group[ 'intro_title' ] ) ?></h2>

					</div>

				</div>
				
			</div>


		<?php 

			// Build Page Sections

			if( have_rows( $page . '_sections' ) ){


				// Loop Over Each Page Section
				while( have_rows( $page . '_sections' ) ){

					the_row();


					// Set our Variables
					$title = get_sub_field( 'title' );
					$sub_title = get_sub_field( 'sub_title' );

					?>


						<div class="o-row o-row--sub-page">

							<div class="o-col-md-12">

								<div class="c-title-group">

									<h3 class="u-text-up e-h3 c-title-group__title"><?php esc_html_e( $title ); ?></h3>

									<?php

									// If there is a subtitle
									 if( $sub_title ){ ?>

										<p class="e-p--common c-title-group__sub"><?php esc_html_e( $sub_title ); ?></p>

									<?php } ?>

								</div>

							</div>



							<?php

								//Build our section list

								if( have_rows( 'list' ) ){ ?>


									<div class="o-col-md-12">
										
										<ul class="c-list-paws c-list-paws--blue">

											<?php while( have_rows( 'list' ) ){

												the_row();



												// Set variables in loop
												$item = get_sub_field( 'list_item', false, false ); ?>


												<li class="e-p--common c-list-paws__item u-max-width--700"><?php esc_html_e( $item ); ?></li>


											<?php } ?>

										</ul>

									</div>

								

							<?php } ?>

					</div>

			<?php } ?>

			</div>

		</div>

		<?php }

} ?>