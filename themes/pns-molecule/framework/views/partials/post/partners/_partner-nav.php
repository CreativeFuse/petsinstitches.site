<?php
/**
 * Partner • Nav
 */
?>

<nav class="c-nav--secondary u-gradient--blue">

	<div class="c-menu c-menu--secondary c-partners__nav js-partners-filter">

		<?php
			// auto-generate list of categories
			// to trigger sorting
			$business_types = get_terms( array( 'taxonomy' => 'business_type', 'parent' => 0 ) );
		?>

		<?php foreach( $business_types AS $business_type ) : ?>
			<button class="c-menu__item" data-filter=".<?php echo esc_attr( $business_type->slug ); ?>"><?php echo esc_html( $business_type->name ); ?></button>
		<?php endforeach; ?>

	</div>

</nav>