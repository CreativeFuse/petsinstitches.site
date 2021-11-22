<?php 
	$rows = get_field('services_and_offerings');
	$count = 0;
?>

<div class="o-section p-home--petcare-services-and-offerings">
	<div class="o-container o-container--max">
		<div class="">
			<h2 class="e-h2 u-color--blue u-align--center">Our Services & Offerings</h2>
		</div>
		<div class="o-row">
			
			<?php if( $rows ) {

				foreach ($rows as $key => $row) {?>
					<div class="column">
						<div class="c-accordion c-accordion--simple c-accordion--simple--1 <?php echo (++$count%2 ? 'odd' : 'even'); ?>">
							<div class="c-accordion--simple__header">
								<h5 class="e-h6 c-accordion--simple__header__title u-text-up"><?php esc_html_e( $row['title'] ); ?></h5>
								<div class="c-accordion__icon c-accordion__icon--simple">
									<div class="c-accordion__icon-bar c-accordion__icon-bar--1"></div>
									<div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>
								</div>
							</div>
							<div class="c-accordion--simple__body u-clearfix">
								<div class="e-p--common c-title-group__sub"><?php echo wp_kses_post( $row['content'] ); ?></div>
							</div>
						</div>
					</div>
			<?php } } ?>
				
		</div>
	</div>
</div>