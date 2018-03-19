<?php

$passion = get_field( 'home_passion' ); 

?>

<div class="o-section p-home--petcare-passion">
	<div class="o-container o-container--max">



		<div class="o-row o-row--passion">

			<div class="o-col-md-5">
				<img class="c-photo c-photo--standard" src="<?php echo esc_url( $passion['image']['url']); ?>" alt="<?php esc_attr_e( $passion['image']['alt']); ?>">
			</div>

			<div class="o-col-md-5 o-col-md-offset-2">

				<div class="c-title-group">

					<h2 class="c-title-group__title e-h2 u-color--blue">
						<?php esc_html_e( $passion['heading'] ); ?>
					</h2>

					<p class="c-title-group__sub e-p--common">
						<?php esc_html_e( $passion['copy'] ); ?>
					</p>

				</div>

			</div>

		</div>


		<?php if( have_rows( 'home_passion_cards' ) ){ ?>


		<div class="o-row o-row--cards">

			

				<?php while( have_rows( 'home_passion_cards' ) ){

					the_row();

					
					?>

					<div class="o-col-md-4">

					<?php Molecule_Router::render( 'page/home', '_home-petcare', 'passion-desktop' ); ?>

					<?php Molecule_Router::render( 'page/home', '_home-petcare', 'passion-mobile' ); ?>

					</div>

				<?php } ?>

			

		</div>

			<?php } ?>


	</div>
</div>