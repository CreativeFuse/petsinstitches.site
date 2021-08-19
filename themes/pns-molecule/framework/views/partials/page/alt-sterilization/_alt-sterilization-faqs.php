<?php

$faqs = CreativeFuse\PetsInStitches\FAQ\get_faqs();
$spay_neutering_faqs = $faqs[19];
$limit = 0;
?>


<div class="o-section p-alt-sterilization--faqs">

	<div class="o-container o-container--max--small">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-faqs">

					<div class="p-faq__section">

						<h2 class="e-h2 c-faq__ssection__title u-color--blue u-align--center">
							<?php echo esc_html( $spay_neutering_faqs['topic_name'] ) . ' FAQs';?>
						</h2>

						<?php 

							// loop over FAQ post for this term
							foreach ( $spay_neutering_faqs['faqs'] AS $faq_list ) :
								// if($limit++==3) break;

								$answer = wp_kses_post( get_field( 'faq_answer', $faq_list['faq_id'] ) ); ?>

								<div itemscope itemtype="http://schema.org/Question" <?php post_class( array( 'c-accordion', 'c-accordion--simple c-accordion--simple--1' ), $faq_list['faq_id'] ); ?>>

									<div class="c-accordion--simple__header">

										<h5 itemprop="name" class="e-h6 c-accordion--simple__header__title u-text-up"><?php echo $faq_list['faq_title']; ?></h5>

										<div class="c-accordion__icon c-accordion__icon--simple">

											<div class="c-accordion__icon-bar c-accordion__icon-bar--1"></div>

											<div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>

										</div>

									</div>

									<div class="c-accordion--simple__body u-clearfix">

										<div itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer" class="e-p--common c-accordion--simple__content">

											<span itemprop="text"><?php echo $answer; ?></span>
											
										</div>

									</div>

								</div>

							<?php endforeach;
						?>
						<p style="text-align: center;color:#9a9a9a;">Interested in more frequently asked questions? <a href="/faqs/" style="">View more</a></p>
					</div>
						

				</div>
			
			</div>
		
		</div>
	
	</div>

</div>