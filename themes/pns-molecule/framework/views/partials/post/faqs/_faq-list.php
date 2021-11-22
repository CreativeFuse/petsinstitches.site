<?php

// $faqs = CreativeFuse\PetsInStitches\FAQ\get_faqs();

?>
<div class="o-section o-section--sub-page">
	<div class="o-container o-container--max--mega">

		<div class="o-row">
			<div class="o-col-md-12">
				<h2 class="e-h2 c-faq__section__title u-color--blue cf-faq-title">Filter By:</h2>
				<?php echo do_shortcode('[facetwp facet="topics"]'); ?>
			</div>
		</div>

	</div>
	<div class="o-container o-container--max--small">

		<div class="o-row">
			<div class="o-col-md-12">
				<?php echo do_shortcode('[facetwp facet="topics_mobile"]'); ?>
				<?php echo do_shortcode('[facetwp template="faqs"]'); ?>
			</div>
		</div>

	</div>

</div>