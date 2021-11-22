<?php

$passion = get_field( 'home_passion' ); 

?>

<div class="o-section p-home--petcare-passion">
	<div class="o-container o-container--max" style="">



		<div class="o-row o-row--passion">

			<div class="o-col-md-12">

				<div class="c-title-group" style="margin-bottom: 35px;">

					<h2 class="c-title-group__title e-h2 u-color--blue u-align--center">
						<?php esc_html_e( $passion['heading'] ); ?>
					</h2>
					<?php if($passion['copy']){ ?>
						<p class="c-title-group__sub e-p--common u-align--center">
							<?php esc_html_e( $passion['copy'] ); ?>
						</p>
					<?php } ?>	
				</div>

			</div>

			<div class="o-col-md-12">
				<img class="c-photo" src="<?php echo esc_url( $passion['image']['url']); ?>" alt="<?php esc_attr_e( $passion['image']['alt']); ?>">
			</div>

		</div>

	</div>
</div>