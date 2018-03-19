<?php
/**
 * HERO • FAQs Archive
 */

$title = 'Frequently Asked Questions';

// Begin our Output
?>

<div class="o-hero o-hero--faqs" style="background-image:url( <?php echo Molecule_Router::get_img_meta( 'acf_options', 'url', 'faqs_bg');?>)">

	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-12">

				<div class="c-title-group c-title-group--hero u-max-width--400">

					<h1 class="e-h1 c-title-group__title u-color--blue"><?php esc_html_e( $title ); ?></h1>

				</div>

			</div>

		</div>

	</div>

</div>