<?php
/**
 * Post Op • Gender Panel
 *
 */


// Set Our ACF prefix
$prefix = 'post_op_';

// Get the gender based on the variable passed into this partial
$gender = $output;

// Build our full field prefix
$parent_group = $prefix . $gender;

$animal_type = get_field( 'post_op_animal_type' );

$types = array(

	'normal',
	'abnormal'

);

// Set our ACF fields

$fields = array(

	'intro',
	'video_url',
	'video_img'

);



?>


<div id="panel--<?php esc_html_e( $output ); ?>" class="o-panel o-panel--post-op">

	<div class="o-section o-section--sub-page">

		<div class="o-container o-container--max--small">


		<?php

		// If the main gender group has data

		if( have_rows( $parent_group ) ){

			// While there is data - loop over it
			while( have_rows( $parent_group ) ){

			the_row(); 

				// For each of the types
				foreach( $types as $type ){

					// Loop over the types
					if( have_rows( $type ) ){ ?>

						<div class="o-row o-row--sub-page p-post-op__row">

						<?php while( have_rows( $type ) ){


						the_row();

							/**
							 * Get Data from ACF and set our final
							 * field variables on each of our type
							 * loops by iterating over our ACF fields
							 * defined in our array.
							 */
		

							foreach ( $fields as $field ){


								if( get_sub_field( $field ) ){

									$postop[ $field ] = get_sub_field( $field );

								} else  {

									$postop[ $field ] = '';

								}

							}

							$section_intro_title = ucfirst( $type ) . ' ';
							$section_intro_title .=  ucfirst( $gender ) . ' ';
							$section_intro_title .=  ucfirst( $animal_type );

							// Now it's time for the output!
							?>
							

								<div class="o-col-md-12 p-post-op__row__intro">

									<div class="c-title-group c-title-group-1">

										<h2 class="e-h2 c-title-group__title u-color--blue">
											<?php esc_html_e( $section_intro_title ); ?>

										</h2>

										<div class="e-p--common c-title-group__sub-title"><?php echo wp_kses_post( $postop['intro'] ); ?></div>

									</div>									

								</div>

							<?php if( $postop[ 'video_url' ] && $postop[ 'video_img' ] ){ ?>


								<div class="o-col-md-12 p-post-op__row__video">
										
									<a href="<?php echo esc_url( $postop[ 'video_url' ]); ?>" data-rel="lightcase:postopVideo<?php esc_html_e( ucfirst( $type ) ); ?>">

										<img class="c-photo c-photo--standard c-photo--video" src="<?php echo esc_url( $postop[ 'video_img' ][ 'url' ] ); ?>" alt="<?php echo esc_html( $postop[ 'video_img' ][ 'alt' ] ); ?>">
									</a>
									

								</div>


							<?php }



								// build variables for the accordion
								$photo_accordion_title = 'View example photos of ';
								$photo_accordion_title .= 	'<span class="u-color--blue-l">' . $type . '</span>';
								$photo_accordion_title .=  	' ' . $gender . ' ';
								$photo_accordion_title .=  	$animal_type;

							?>


								<div class="o-col-md-12 p-post-op__row__accordion">
			
									<div class="c-accordion c-accordion--simple c-accordion--simple--2 js-expand-accordion">
										<div class="c-accordion--simple__header u-clearfix">
											<h5 class="e-h6 c-accordion--simple__header__title u-text-up">
												 <?php echo wp_kses_post( ( $photo_accordion_title ) ); ?>
											</h5>

											<div class="c-accordion__icon c-accordion__icon--simple">
												<div class="c-accordion__icon-bar 
												c-accordion__icon-bar--1"></div>

												<div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>
											</div>

										</div>

										<div class="c-accordion--simple__body u-clearfix">
											
											<?php

											// Loop through our animal photos

											if( have_rows( 'photos' ) ){

												while( have_rows( 'photos' ) ){
													the_row();

													$img = get_sub_field( 'photo' );

													$img_src = $img['sizes']['medium'];
													$img_lightbox = $img['url'];
													$img_alt = $img['alt']; 
													$img_cap = $img['caption'];

													?>
													<div class="o-col-md-4">

														<a href="<?php echo esc_url( $img_lightbox ); ?>" data-rel="lightcase:postopGallery<?php esc_html_e( ucfirst( $type ) ); ?>" title="<?php echo esc_html( $img_cap ); ?>" class="c-accordion--simple__body__img-wrap">

															<img class="c-photo c-photo--fancy" src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_html( $img_alt ); ?>">

														</a>

													</div>

												<?php }	

											} else { ?>

												<p class="e-p--common">There are currently no <strong><?php esc_html_e( $type ); ?></strong> postoperative photos to display for this animal/gender combination.</p>

												<?php } ?>


										</div>

									</div>

								</div>


					<?php } // End While ?>

					</div>  <?php // Close the Row Div

					}


				}

			}

		} ?>

		</div>


	</div>

</div>