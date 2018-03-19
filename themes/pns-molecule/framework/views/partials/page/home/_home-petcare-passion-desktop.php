<?php

$icon = get_sub_field( 'front_icon' );
$title = get_sub_field( 'front_title' );

?>


	<div class="c-card c-card--flip">

		<div class="c-card--flip__front u-align--center">
			<?php Molecule_Display::svg( $icon, 'standard');?>
			<h3 class="c-card--flip__title e-h3"><?php esc_html_e( $title );?></h3>
		</div>

		<div class="c-card--flip__back">

			

			<?php if( have_rows( 'card_back' ) ){ ?>

				<ul class="u-color--white c-list-paws c-list-paws--blue-l">

				<?php while( have_rows( 'card_back' ) ){

					the_row();


					$item = get_sub_field( 'list_item', false, false ); ?>

					

				<li class="c-list-paws__item e-p--common"><?php echo esc_html( $item ); ?></li>
			

				<?php } ?>

				</ul>

			<?php } ?>
			

			</div>

		</div>
