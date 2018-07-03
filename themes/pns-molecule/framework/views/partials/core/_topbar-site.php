<?php

// Create our Button Group

$buttons = array(


	'appointment' => array(

		'text' => 'Make An Appointment',
		'link' => '/request-appointment',

	),


	'getting-started' => array(

		'text' => 'Getting Started',
		'link' => '/getting-started',

	),


	'forms' => array(

		'text' => 'Forms',
		'link' => '/forms',

	),

);

?>


<div class="o-topbar">

	<div class="o-container o-container--max o-container--width">

		<?php

			foreach( $buttons as $button ){ ?>

				<a class="c-btn c-btn--small c-btn--outline c-btn--blue c-btn--hover-fill c-btn--topbar" href="<?php echo esc_url( $button['link'] ); ?>" data-event-origin="top-nav-button">

					<div class="c-btn__text">
						<?php esc_html_e( $button['text'] ); ?>
					</div>

				</a>

			<?php } ?>


		<a class="o-topbar__phone e-p--large--semi c-text-icon c-text-icon--phone" href="tel:937-630-3320">

			<?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon-phone.svg' ); ?>

			937-630-3320
		</a>

	</div>

</div>