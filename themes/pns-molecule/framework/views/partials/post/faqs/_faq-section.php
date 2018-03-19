<div class="p-faq__section">

	<h2 class="e-h2 c-faq__section__title u-color--blue">
		<?php echo esc_html( $output['topic_name'] );?>
	</h2>

	<?php 

		// loop over FAQ post for this term
		foreach ( $output['faqs'] AS $faq_list ) :

			// Each item rendered uses the following component
			Molecule_Router::render( 'post/faqs', '_faq', 'accordion', $faq_list );

		endforeach;
	?>

</div>

