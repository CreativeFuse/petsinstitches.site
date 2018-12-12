<?php
/**
 * Post Op • Videos Panel
 *
 */

// Use the output passed to this file and re-assign as $pet
$pet = $output;

// The Panel Title will be our pet name by default
$pet_singular = $pet;

// If the Animal is pluralized ( ending with an S ), we will strip out the S
if (substr($pet , -1) == 's'){
	$pet_singular = substr($pet, 0, -1);
}

//The panel Class will need to be properly formatted for our CSS
$panel_class = strtolower( str_replace( ' ', '-', $pet ) );


//And Finaly, let's build our ACF group field

// Lowercase it
$group = strtolower( $pet_singular );

// Replace spaces and dashes with underscores
$group = str_replace( array( ' ', '-' ), '_', $group );

?>

<div id="panel--<?php esc_html_e( $panel_class ); ?>" class="o-panel o-panel--post">

	<div class="o-panel__header o-container o-container--max">

		<div class="o-section o-section--sub-page">

			<div class="o-row o-row__tee-up">

				<!-- Begin main tee-up for this form group -->

				<div class="o-col-md-12">

					<div class="c-title-group u-max-width--900">

						<h2 class="e-h2 c-title-group__title u-color--blue"><?php esc_html_e( $pet_singular . ' Forms' ); ?></h2>
						<p class="e-p--common c-title-group__sub"><?php esc_html_e( 'Here are the forms you will need for your pet\'s surgery. Please note below.' ); ?></p>

					</div>

				</div>

				<?php

				// If the intro repeater for this animal has data, let's dive in

				if( have_rows( $group . '_intro' ) ){ ?>

						<div class="o-col-md-12">

							<ul class="c-list-paws c-list-paws--blue">

								<?php

									// Loop over all intro items

									while( have_rows( $group . '_intro' ) ){

									the_row();


									// Set variables in loop
									$item = get_sub_field( 'item', false, false ); ?>


									<li class="e-p--common c-list-paws__item u-max-width--900"><?php esc_html_e( $item ); ?></li>


								<?php } ?>

							</ul>


						</div>

				<?php } // End Form Intro Repeater ?>

				</div>
				<!-- End Form Group Tee-up -->

				<?php

				/**
				 * Each set of animal forms is broken down into multiple sections.
				 * Let's start by getting the forms section repeater data
				 * for the current animal group.
				 */

				$form_sections = get_field( $group . '_forms' );

				// Loop over each form section
				foreach( $form_sections as $section ){

					// Get the forms repeater within the forms section
					$forms = $section['forms'];

					// If we have forms added to the reapeater, let's continue
					if( $forms ){ ?>

						<div class="o-row o-row--sub-page p-forms__row">

							<div class="o-col-md-12">

								<!-- Form Section Title -->

								<div class="c-title-group">

									<h3 class="e-h3 c-title-group__title u-text-up "><?php esc_html_e( $section['title'] ); ?></h3>

								</div>

								<div class="c-collection--download-cards">

									<!-- Display each available form -->
									<?php foreach( $forms as $form_object ){

										/**
										 * From this point forward, we are relying on a plugin called
										 * Download Monitor to be active and for the necessary files
										 * to be loaded in within ACF. ACF is returning a post object instance
										 * of each download and we are tapping into it here :)
										 */

										if( $form_object && class_exists( 'WP_DLM' ) ){

											// Build our download URL
											$download_link = esc_url( site_url("/download/{$form_object['form']->post_name}") );

											?>

											<div class="c-download-card__item">

												<a class="c-download-card" target="_blank" href="<?= $download_link; ?>">

													<div class="c-download-card__header">

													</div>

													<div class="c-download-card__body">
														<h4 class="e-p--large c-download-card__title"><strong><?php esc_html_e( $form_object['form']->post_title ); ?></strong></h4>
														<p class="e-p--common c-download-card__copy">
															<?php esc_html_e( $form_object['form']->post_content ); ?>
														</p>
													</div>

													<div class="c-download-card__footer">
														<p class="e-p--common c-download-card__download-text"><strong><?= esc_html( 'Download Form' ); ?></strong></p>
													</div>

												</a>

											</div>
										<?php } // End if

										} // End For Each

										wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

										?>

								</div>

							</div>

						</div>

					<?php }


				}?>


		</div>

	</div>

</div>