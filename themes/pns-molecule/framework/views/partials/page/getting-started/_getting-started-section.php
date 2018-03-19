<?php

if( have_rows( 'steps' ) ){ ?>
	
	<div class="o-section o-section--sub-page">

		<?php

		$count = 1;

		while( have_rows( 'steps' ) ){


			the_row();

				Molecule_Router::render( 'page/getting-started', '_getting-started', 'step', $count );

			$count ++;

		} ?>

	</div>

<?php } ?>