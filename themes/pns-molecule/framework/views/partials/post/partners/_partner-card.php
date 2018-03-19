<?php
/**
 * Partner • Card
 */
$partner_bysiness_types = get_the_terms( get_the_ID(), 'business_type' );

$business_type_slugs = array();
if ( ! empty( $partner_bysiness_types ) ) {
	$business_type_slugs = array_map( 'esc_attr', wp_list_pluck( $partner_bysiness_types, 'slug' ) );
}



// Set Our ACF prefix
$prefix = 'partner_';

// Set our ACF fields

$fields = array(

	'link',
	'address',
	'city',
	'phone'

);

/**
 * Get Data from ACF
 */

foreach ( $fields as $field ){


	if( get_field( $prefix . $field ) ){

		// Get the ACF data from each field

		$partner[ $field ] = wp_kses_post( get_field( $prefix . $field ) );

	} else {

		$partner[ $field ] = '';
		
	}

}


?>

<a class="c-card c-card--fancy c-card--partner <?php echo implode( ' ', $business_type_slugs ); ?>" href="<?php echo $partner['link']; ?>" target="_blank">

		<div class="c-card__media">

			<img class="c-photo--fancy" src="<?php echo Molecule_Router::get_img_meta( 'post', 'url' );?>" alt="<?php echo Molecule_Router::get_img_meta( 'post', 'alt' );?>">

		</div>
		
		<div class="c-card__content">

			<h2 class="e-h6 c-card__title u-color--gray"><?php the_title(); ?></h2>

			<p class="e-p--common c-card__address u-color--gray">
				<?php echo $partner['address']; ?></br>
				<?php echo $partner['city']; ?>
			</p>

			<p class="e-p--common c-card__phone u-color--gray u-text-bold"><?php echo $partner['phone']; ?></p>

		</div>

</a>

