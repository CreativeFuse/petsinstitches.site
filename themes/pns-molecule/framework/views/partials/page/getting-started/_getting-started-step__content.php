<?php

$fields = array(

	'type',
	'title',
	'copy',
	'button',
	'quote'

);


/**
 * Get Data from ACF and set our final
 * field variables on each of our type
 * loops by iterating over our ACF fields
 * defined in our array.
 */


foreach ( $fields as $field ){


	if( get_sub_field( $field ) ){

		$step[ $field ] = get_sub_field( $field );

	} else  {

		$step[ $field ] = '';

	}

}

/**
 * If we have selected to display a simple step type
 */
if( $step['type'] == 'simple' ){ ?>
	
	<div class="c-title-group c-title-group--getting-started u-max-width--500">

		<h1 class="e-h2 c-title-group__title u-color--blue">
			<?php echo esc_html( $step['title'] ); ?>
		</h1>

		<div class="e-p--common c-title-group__sub">
			<?php echo wp_kses_post( $step['copy'] ); ?>
		</div>

		<a class="c-btn c-btn--fill c-btn--purple c-btn--hover-outline c-title-group__btn" href="<?php echo esc_url( $step['button']['url'] ); ?>">
			<div class="c-btn__text">
				<?php echo esc_html( $step['button']['title'] ); ?>					
			</div>
		</a>

	</div>



<?php
	
	/**
	 * If we have selected to display a Complex step type
	 */

	} elseif ( $step['type'] == 'complex' ){ ?>


	<div class="c-title-group c-title-group--getting-started">

		<h1 class="e-h2 c-title-group__title u-color--blue">
			<?php echo esc_html( $step['title'] ); ?>
		</h1>

	</div>


	<div class="c-card c-card--getting-started">

		<blockquote class="u-color--blue">
			"<?php echo esc_html( $step['quote'] ); ?>"
		</blockquote>

	</div>

	<div class="c-box__content c-box--getting-started">

		<div class="c-box__content__holder">

			<div class="e-p--common c-box__copy">
				<?php echo wp_kses_post( $step['copy'] ); ?>
			</div>

			<div class="c-box__content__mask"></div>

		</div>

		<a class="c-btn c-btn--purple c-btn--fill c-btn--hover-outline c-box__more js-read-more" href="#"><?php echo esc_html( 'Read More' ); ?></a>

	</div>


<?php
	
	/**
	 * If we have failed to select a step type
	 */

	} else { ?>

	<p class="e-p--common">
		You must select a step type from the Getting Started admin page.
	</p>

<?php } ?>