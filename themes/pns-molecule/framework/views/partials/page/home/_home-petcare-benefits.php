<?php 
$rows = get_field('benefits');
?>

<div class="o-section p-home--petcare-benefits">
	<div class="o-container o-container--max">
		<div class="">
			<h2 class="e-h2 u-color--blue u-align--center">Benefits for Your Pet</h2>
		</div>
		<div class="o-row">
			
			<?php if( $rows ) {

				foreach ($rows as $key => $row) {?>
					<div class="o-col-sm-6 o-col-md-4">
						<div class="benefits-card">
							<div class="benefits-card-header" style="background-image:url( <?php esc_html_e( $row['icon'] ); ?> );">
								<h3 class="e-h3 u-color--blue"><?php esc_html_e( $row['title'] );?></h3>
							</div>
							<div class="benefits-card-body e-p--common" style="">
								<p><?php echo wp_kses_post( $row['content'] ); ?></p>
								<?php if( $row['link'] ) {?>
									<p><a href="<?php esc_html_e( $row['link'] ); ?>">Learn more</a></p>
								<?php } ?>
							</div>
						</div>
					</div>
			<?php } } ?>
				
		</div>
	</div>
</div>