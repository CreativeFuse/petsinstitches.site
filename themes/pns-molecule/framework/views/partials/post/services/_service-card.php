<?php
/**
 * Service • Card
 */

// Set Our ACF prefix
$prefix = 'service_';

// Set our ACF fields

$fields = array(

	'cost',
	'note',
	'description'

);

/**
 * Get Data from ACF
 */

foreach ( $fields as $field ){


	if( get_field( $prefix . $field, $output['service_id'] ) ){

		$service[ $field ] = esc_html( get_field( $prefix . $field, $output['service_id'] ) );

	} else  {

		$service[ $field ] = '';
		
	}

}


?>

<div itemprop="itemListElement" itemscope itemtype="http://schema.org/Offer" <?php post_class( 'c-card c-card--simple c-card--service ' ); ?> >

	<meta itemprop="price" content="<?php echo $service['cost']; ?>" />
	<meta itemprop="priceCurrency" content="USD" />

	<div itemprop="itemOffered" itemscope itemtype="http://schema.org/Service" class="c-card__header u-clearfix">

		<h4 class="e-h6 c-card__title">

			<span itemprop="serviceType name"><?php echo esc_html( $output['service_title'] ); ?></span>

		</h4>


	<?php if( $service['cost'] ){ ?>

		<h5 class="e-h6 c-card__cost">
			<?php echo '$' . $service['cost']; ?>
		</h5>

	<?php } else { ?>

		<h5 class="e-h6 c-card__cost c-card__cost--tbd">
			<?php echo 'TBD' ?>
		</h5>

	<?php } ?>

	</div>

	<div class="c-card__body">

		<p class="e-p--common c-card__description">
			<span itemprop="description"><?php echo $service['description']; ?></span>
		</p>

		<?php

			// If there is a special serice note for this service

			if( $service[ 'note' ] ){


				$service_note = '';	
				$service_note_title = '';	

				// Check against selected option and output proper value & Label

				if( $service['note'] == 'surgurey_req'  ){


					$service_note = 'req';
					$service_note_title = 'Required with Surgery';

				} elseif( $service[ 'note' ] == 'surgurey_rec' ){


					$service_note = 'rec';
					$service_note_title = 'Recommended with Surgery';


				} elseif( $service[ 'note' ] == 'surgurey_opt' ){

					$service_note = 'opt';
					$service_note_title = 'Optional with Surgery';


				} elseif( $service[ 'note' ] == 'wellness' ){


					$service_note = 'well';
					$service_note_title = 'Wellness';


				} else {} ?>


				<div class="c-service-considerations__item c-service-considerations__item--<?php echo esc_html( $service_note ); ?>">

					<div class="c-service-considerations__color"></div>

					<p class="e-p--large--semi c-service-considerations__name u-text-up"><?php echo esc_html( $service_note_title ); ?></p>

				</div>


			<?php } ?>

	</div>

</div>

