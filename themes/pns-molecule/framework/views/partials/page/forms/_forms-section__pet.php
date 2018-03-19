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

// Append _forms to it
$group = $group . '_forms';

?>

<div id="panel--<?php esc_html_e( $panel_class ); ?>" class="o-panel o-panel--post">

	<div class="o-panel__header o-container o-container--max">

		<div class="o-section o-section--sub-page">

			<div class="o-row o-row__tee-up">

				<div class="o-col-md-12">

					<div class="c-title-group u-max-width--900">

						<h2 class="e-h2 c-title-group__title u-color--blue"><?php esc_html_e( $pet_singular . ' Forms' ); ?></h2>
						<p class="e-p--common c-title-group__sub"><?php esc_html_e( 'Here are the forms you will need for your pet\'s surgery. Please note below.' ); ?></p>

					</div>


				</div>

				<?php

				//If we have list item data, let's show it
				
				if( have_rows( $group . '_intro' ) ){ ?>

						<div class="o-col-md-12">

							<ul class="c-list-paws c-list-paws--blue">

								<?php

									// Loop over all list items

									while( have_rows( $group . '_intro' ) ){

									the_row();


									// Set variables in loop
									$item = get_sub_field( 'item', false, false ); ?>


									<li class="e-p--common c-list-paws__item u-max-width--900"><?php esc_html_e( $item ); ?></li>


								<?php } ?>

							</ul>


						</div>

				<?php } ?>

			</div>

				<?php
				// handle Required and Optional Forms
				// we start by setting an arroy of
				// our form types
				
				$form_types = array(

					'required',
					'optional',
					'wellness'

				);

				// For each type of form
				foreach( $form_types as $form_type ){

					// Set the current form type group ( should be the acf field )
					$form_type_group = $group . '_' . $form_type . '_forms';
					
					// If we have data
					if( have_rows( $form_type_group ) ){ ?>

						<div class="o-row o-row--sub-page p-forms__row--<?php esc_html_e( $form_type ); ?>">

							<div class="o-col-md-12">

								<div class="c-title-group">

									<h3 class="e-h3 c-title-group__title u-text-up "><?php esc_html_e( $form_type . ' Forms'  ); ?></h3>

								</div>

								<?php

								// Loop Over the data
								while( have_rows( $form_type_group ) ){

									the_row();

									// Get ACF data from our Form Type Group
									$link = get_sub_field( 'link' );
									$desc = get_sub_field( 'description', false, false );

									?>

									<div class="c-text-group u-max-width--900">

										<a class="e-p--common c-text-group__title c-text-link" href="<?php esc_html_e( $link['url'] ); ?>" target="<?php esc_html_e( $link['target'] ); ?>"><?php esc_html_e( $link['title'] ); ?></a>

										<p class="e-p--common c-text-group__copy"><?php esc_html_e( $desc ); ?></p>

									</div>


								<?php }?>

							</div>

						</div>

					<?php }				


				}?>
			

		</div>

	</div>

</div>