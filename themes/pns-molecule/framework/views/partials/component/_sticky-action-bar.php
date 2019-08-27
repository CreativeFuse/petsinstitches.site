<?php

$action_items = [

	[
		'title' => 'Make an Appointment',
		'link'	=> home_url( '/request-appointment/' ),
		'icon' 	=> 'calendar',
		'color' => 'blue-m'
	],

	[
		'title' => 'Getting Started',
		'link'	=> home_url( '/getting-started/' ),
		'icon' 	=> 'start',
		'color' => 'blue'

	],

	[
		'title' => 'Download Forms',
		'link'	=> home_url( '/forms/' ),
		'icon' 	=> 'form',
		'color' => 'blue-d'
	]


];

?>

<div class="c-action-bar">

	<?php foreach( $action_items as $item ){ ?>

		<a class="c-action-bar__item" href="<?php echo esc_url( $item['link'] ); ?>" data-event-origin="sticky-action-bar-button">

			<div class="c-action-bar__item__icon">
				<?= Molecule_Display::svg( $item['icon'], 'action-bar' ); ?>
			</div>

			<h4 class="c-action-bar__item__text e-p--common u-text-up"><?php echo esc_html( $item['title'] ); ?></h4>

		</a>

	<?php } ?>

</div>
