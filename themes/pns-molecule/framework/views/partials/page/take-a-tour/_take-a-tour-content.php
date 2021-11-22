<?php
	if( have_rows( 'take_a_tour' )){
		$content = get_field('take_a_tour');
		$cards = $content['cards'];
		$count = 0;
		// print("<pre>".print_r($content['cards'],true)."</pre>");
	}
?>

<div class="o-section p-home--petcare-take-a-tour">
	<div class="o-container o-container--max">
		<div class="o-row">
			
			<?php if( $cards ) {

				foreach ($cards as $key => $card) {
						$img_src = $card['image']['sizes']['large'];
						$img_lightbox = $card['image']['url'];
						$img_alt = $card['image']['alt']; 
						$img_cap = $card['image']['caption'];

					?>
					<div class="column <?php echo (++$count%2 ? 'odd' : 'even'); ?>">
						<div class="cf-card">
							<h2 class="c-title-group__title e-h2 u-color--blue"><?php esc_html_e( $card['title'] ); ?></h2>
							<div class="img-container">
								
							
							<a  href="<?php echo esc_url( $img_lightbox ); ?>" data-rel="lightcase:postopGalleryNormal" title="<?php echo esc_html( $img_cap ); ?>" class="">

								<img class="c-photo cf-image" src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_html( $img_alt ); ?>" style="">
								<div class="overlay">
									<div class="overlay-background"></div>
								    <!-- <?php Molecule_Display::svg( 'search', 'standard');?> -->
								    <?php echo file_get_contents( molecule()->get_setting( 'svg_dir' ) . 'icon--search.svg' ); ?>
								</div>
							</a>
							</div>
							<div class="e-p--common"><?php echo wp_kses_post( $card['content'] ); ?></div>
						</div>
						
					</div>
			<?php } } ?>
				
		</div>
	</div>
</div>