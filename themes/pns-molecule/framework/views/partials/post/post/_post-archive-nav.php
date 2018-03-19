<div class="o-container">

	<div class="o-row">

		<nav class="c-nav--secondary u-gradient--blue u-clearfix">

			<ul class="c-menu c-menu--secondary c-tabs__menu u-clearfix">


				<?php

					// If we are on the blog home, set the ALL Menu item to active
					// otherwise, it will be inactive
				
					$active_class = ( is_home() ) ? ' c-menu__item--active' : ''; ?>
				
				<li class="c-menu__item<?php echo $active_class; ?>">

					<a href="<?php esc_html_e( '/blog/' );?>">

						<?php esc_html_e( 'All' ); ?>	

					</a>

				</li>

				<?php
					// Loop through and display Cats, Dogs, Rabits as Menu items
					$categories = get_terms( array( 'taxonomy' => 'category' ) );

					foreach ( $categories AS $category ) :
				?>
					<?php Molecule_Router::render( 'post/post', '_post', 'archive-menu__items', $category ); ?>

				<?php endforeach; ?>

			</ul>

		</nav>

	</div>
	
</div>