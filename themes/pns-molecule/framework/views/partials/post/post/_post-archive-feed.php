<div class="o-section o-section--sub-page" style="padding-bottom: 60px;">

	<div class="o-container o-container--max">

		<div class="o-row">
			<div class="o-col-md-12">
				<h2 class="e-h2 c-faq__section__title u-color--blue cf-faq-title">Filter By:</h2>
				<?php echo do_shortcode('[facetwp facet="blog_categories"]'); ?>
			</div>
		</div>

	</div>

	<div itemscope itemtype="http://schema.org/Blog" class="o-section o-section--post-archive">

		<div class="o-container o-container--max">
			<div class="o-row">
				<div class="o-col-md-12">
					<?php echo do_shortcode('[facetwp facet="blog_mobile"]'); ?>
					<?php echo do_shortcode('[facetwp template="blog"]'); ?>
					<?php echo do_shortcode('[facetwp facet="blog_pagination"]'); ?>
				</div>
			</div>
		</div>
		
	</div>
	
</div>
<script>
	jQuery(function(){
		console.log('test');
		jQuery('.facetwp-load-more').addClass('c-btn c-btn--small c-btn--outline c-btn--blue c-btn--hover-fill');
	});
</script>