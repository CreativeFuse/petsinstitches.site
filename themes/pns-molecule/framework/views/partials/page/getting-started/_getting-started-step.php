<?php

// Bring our row count into the mix by re-assigning the output variable

$row_count = $output;


$odd_or_even = '';

// If our count is odd, assign the appropriate vaue to the variable
if( $row_count &  1 ){

	$odd_or_even = 'odd';

} else {

	// If it is even, assig the appropriate value to variable
	$odd_or_even = 'even';

}


?>

<div class="o-container o-container--max">
	
	<div class="o-row o-row--<?php esc_html_e( $odd_or_even ); ?> o-row--getting-started">

		<div class="o-col-sm-6 o-col-6--left o-col-6--<?php esc_html_e( $odd_or_even ); ?>">


			<?php 

				// If the current looped over step is odd
				if( $odd_or_even == 'odd' ){

					// Output our image
					Molecule_Router::render( 'page/getting-started', '_getting-started', 'step__image');	

				} else {
				//If it is even

					// Output our content
					Molecule_Router::render( 'page/getting-started', '_getting-started', 'step__image--mobile', $odd_or_even) ;

					// Output our content
					Molecule_Router::render( 'page/getting-started', '_getting-started', 'step__content');

				}

			?>


		</div>


		<div class="o-col-sm-6 o-col-6--right o-col-6--<?php esc_html_e( $odd_or_even ); ?>">

			<?php 

				// If the current looped over step is odd
				if( $odd_or_even == 'odd' ){

					// Output our image
					Molecule_Router::render( 'page/getting-started', '_getting-started', 'step__content', $odd_or_even );	

				} else {
				//If it is even

					// Output our content
					Molecule_Router::render( 'page/getting-started', '_getting-started', 'step__image', $odd_or_even) ;

				}

			?>

		</div>

		
	</div>

</div>