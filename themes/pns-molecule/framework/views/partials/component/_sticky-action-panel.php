<?php

$action_items = array(

	1 => array(

		'title' => 'Make an Appointment',
		'link'	=> '/request-appointment/',
		'icon' 	=> 'calendar',
		'color' => 'blue-m'

	),

	2 => array(

		'title' => 'Getting Started',
		'link'	=> '/getting-started/',
		'icon' 	=> 'start',
		'color' => 'blue'

	),

	3 => array(

		'title' => 'Download Forms',
		'link'	=> '/forms/',
		'icon' 	=> 'form',
		'color' => 'blue-d'

	)


); ?>

<div class="c-action-panel">


	<ul class="c-menu c-action-panel__wrapper">

		<?php foreach( $action_items as $item ){ ?>
	
			<li class="c-action-panel__item">

				<a class="c-action-panel__link c-action-panel__link--<?php echo esc_attr( $item['color'] ); ?>" href="<?php echo esc_url( $item['link'] ); ?>">


					<h4 class="c-action-panel__link__text e-p--common u-text-up"><?php echo esc_html( $item['title'] ); ?></h4>
					

				</a>

			</li>


		<?php } ?>

	</ul>
	
</div>