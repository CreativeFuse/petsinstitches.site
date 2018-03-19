<div class="o-container">

	<div class="o-row">

		<nav class="c-nav--secondary u-gradient--blue u-clearfix">

			<ul class="c-menu c-menu--secondary c-tabs__menu u-clearfix">
				<?php $active_class = ( empty( get_query_var( 'animal', '' ) ) ) ? ' c-menu__item--active' : ''; ?>
				<li class="c-menu__item<?php echo $active_class; ?>">
					<a href="<?php esc_html_e( '/testimonials' );?>">
						<?php esc_html_e( 'All' ); ?>	
					</a>
				</li>

				<?php
					// Loop through and display Cats, Dogs, Rabits as Menu items
					$animals = get_terms( array( 'taxonomy' => 'animal' ) );
					foreach ( $animals AS $animal ) :
				?>
					<?php Molecule_Router::render( 'post/testimonials', '_testimonial', 'menu__items', $animal ); ?>
				<?php endforeach; ?>
			</ul>

		</nav>

	</div>
	
</div>