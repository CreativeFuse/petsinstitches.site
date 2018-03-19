<?php

$image = 'https://placehold.it/350x350';

if( get_sub_field( 'image' ) ){

	$image = get_sub_field( 'image' );

} ?>

<img class="c-photo c-photo--fancy c-photo--getting-started c-photo--getting-started--desktop" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_html( $image['alt'] ); ?>" height="350" width="350">