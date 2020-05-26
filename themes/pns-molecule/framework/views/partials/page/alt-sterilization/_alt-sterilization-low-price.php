<?php
/**
 * Get ACF data for Low Price!
 */

$title = get_field('home_low_price_guarantee_title', 9);
$value_prop = get_field( 'home_low_price_guarantee_value_prop', 9, false );
$value_prop_sub = get_field( 'home_low_price_guarantee_value_prop_sub', 9, false );

?>


<div class="o-section p-alt-sterilization--low-price">

	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-title-group u-max-width--700 u-center">

						<h2 class="p-home--low-price__title c-title-group__title e-h2 u-color--blue u-align--center">
							<?php esc_html_e( $title ); ?>
						</h2>

						<p class="p-home--low-price__value-prop c-title-group__sub e-h4">
							<?php echo wp_kses_post( $value_prop ); ?>
						</p>

						<p class="p-home--low-price__value-prop-sub c-title-group__sub__sub e-p--common u-max-width--600">
							<?php echo wp_kses_post( $value_prop_sub ); ?>
						</p>

				</div>

			</div>
		</div>
	</div>
</div>
