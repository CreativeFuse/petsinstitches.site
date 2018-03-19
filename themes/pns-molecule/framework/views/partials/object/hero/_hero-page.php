<?php
/**
 * HERO • Page
 */

/**
 * Set variables we need to work with
 */

	$title = get_the_title();
	$sub_title = '';

	if( get_field( 'hero_title' ) ){
		$title = get_field( 'hero_title' );
	}

	if( get_field( 'hero_sub_title' ) ){
		$sub_title = get_field( 'hero_sub_title' );
	}



?>


<div class="o-hero o-hero--page o-hero--page--<?php echo Molecule_Display::page_title(); ?>" style="background-image:url( <?php echo Molecule_Router::get_img_meta( 'post', 'url' );?>)">


	<div class="o-container o-container--max">

		<div class="o-row">

			<div class="o-col-md-6">
			</div>

			<div class="o-col-md-6">
			
				<div class="c-title-group c-title-group--hero u-max-width--600">

					<h1 class="e-h1 c-title-group__title u-color--blue"><?php esc_html_e( $title ); ?></h1>

					<?php if( $sub_title ){ ?>

						<h1 class="e-h2 c-title-group__sub u-color--blue-m"><?php esc_html_e( $sub_title ); ?></h1>


					<?php } ?>
					
				</div>

			</div>

		</div>

	</div>

</div>