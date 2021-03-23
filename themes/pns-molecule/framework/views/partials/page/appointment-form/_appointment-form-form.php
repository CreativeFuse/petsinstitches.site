<?php

	$left_img = get_field( 'appointement_form_bg_left' );
	$right_img = get_field( 'appointement_form_bg_right' );

?>

<div class="o-section o-section--form">
	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">

				<div itemprop="target" class="c-form u-max-width--700 u-center">

					<?php echo do_shortcode( '[gravityform id=4 ajax=true title=false description=false]' ); ?>

				</div>
			</div>
		</div>
	</div>

	<div class="o-section o-section--request-apt-images">
		<img class="o-section--request-apt__image o-section--request-apt__image--left" src="<?= esc_url( $left_img['url'] ); ?>" alt="<?= esc_html( $left_img['url'] ); ?>" width="350" height="350">
		<img class="o-section--request-apt__image o-section--request-apt__image--right" src="<?= esc_url( $right_img['url'] ); ?>" alt="<?= esc_html( $right_img['url'] ); ?>" width="350" height="350">
	</div>

</div>