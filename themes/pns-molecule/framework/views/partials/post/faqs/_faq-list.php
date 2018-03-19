<?php

$faqs = CreativeFuse\PetsInStitches\FAQ\get_faqs();

?>
<div class="o-section o-section--sub-page">

	<div class="o-container o-container--max--small">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-faqs">

					<?php 

						// Loop over FAQ terms
						foreach ( $faqs AS $faq_group ) :
							// Each item rendered uses the following component
							Molecule_Router::render( 'post/faqs', '_faq', 'section', $faq_group );

						endforeach;
					?>

				</div>

			</div>

		</div>

	</div>

</div>