<?php
/**
 * Get ACF data for Low Price!
 */

$title = get_field('home_low_price_guarantee_title');
$value_prop = get_field( 'home_low_price_guarantee_value_prop', false, false );
$value_prop_sub = get_field( 'home_low_price_guarantee_value_prop_sub', false, false );

$restrictions_title = get_field( 'home_low_price_guarantee_restrictions_title' );
$restrictions = get_field( 'home_low_price_guarantee_restrictions' );

?>


<div class="o-section p-home--low-price">

	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-title-group u-max-width--800 u-center">

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

				<div class="p-home--low-price__restrictions c-accordion c-accordion--simple c-accordion--simple--1 js-expand-accordion u-max-width--700 u-center">

					<div class="c-accordion--simple__header u-clearfix">

						<h5 class="e-h6 c-accordion--simple__header__title u-text-up">
							<?php esc_html_e( $restrictions_title ); ?>
						</h5>

						<div class="c-accordion__icon c-accordion__icon--simple">

							<div class="c-accordion__icon-bar
							c-accordion__icon-bar--1"></div>

							<div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>

						</div>

					</div>

					<div class="c-accordion--simple__body u-clearfix">

						<p class="e-p--common"><?php echo wp_kses_post( $restrictions ); ?></div>

					</div>

				</div>

			</div>
		</div>
	</div>
</div>
