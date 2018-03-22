<?php
/**
 * FAQ • Accordion
 */

$answer = wp_kses_post( get_field( 'faq_answer', $output['faq_id'] ) );


?>

<div itemscope itemtype="http://schema.org/Question" <?php post_class( array( 'c-accordion', 'c-accordion--simple c-accordion--simple--1' ), $output['faq_id'] ); ?>>

	<div class="c-accordion--simple__header">

		<h5 itemprop="name" class="e-h6 c-accordion--simple__header__title u-text-up"><?php echo $output['faq_title']; ?></h5>

		<div class="c-accordion__icon c-accordion__icon--simple">
			<div class="c-accordion__icon-bar 
			c-accordion__icon-bar--1"></div>

			<div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>
		</div>

	</div>

	<div class="c-accordion--simple__body u-clearfix">

		<div itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer" class="e-p--common c-accordion--simple__content">
			<span itemprop="text"<?php echo $answer; ?></span>
		</div>

	</div>

</div>