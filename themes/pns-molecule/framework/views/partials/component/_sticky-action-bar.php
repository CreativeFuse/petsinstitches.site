<?php

$action_items = [

	[
		'desktop_title' => 'Make an Appointment',
		'mobile_title' => 'Appointment',
		'link'	=> home_url( '/request-appointment/' ),
		'icon' 	=> 'calendar',
	],

	[
		'desktop_title' => 'Getting Started',
		'mobile_title' => 'Get Started',
		'link'	=> home_url( '/getting-started/' ),
		'icon' 	=> 'start',
		'color' => 'blue'

	],

	[
		'desktop_title' => 'Download Forms',
		'mobile_title' => 'Forms',
		'link'	=> home_url( '/forms/' ),
		'icon' 	=> 'form',
		'color' => 'blue-d'
	]


];

?>

<div class="c-action-bar">

	<div class="c-action-bar__container">

		<?php foreach( $action_items as $item ){ ?>

			<a class="c-action-bar__item" href="<?php echo esc_url( $item['link'] ); ?>" data-event-origin="sticky-action-bar-button">

				<div class="c-action-bar__item__icon">
					<?= Molecule_Display::svg( $item['icon'], 'action-bar' ); ?>
				</div>

				<h4 class="e-p--large--semi c-action-bar__item__text">
					<span class="__desktop-content"><?= esc_html( $item['desktop_title'] ); ?></span>
					<span class="__mobile-content"><?= esc_html( $item['mobile_title'] ); ?></span>
				</h4>

			</a>

		<?php } ?>

	</div>

</div>
