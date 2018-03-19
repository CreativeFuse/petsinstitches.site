<?php
/**
 * Testimonials • Menu items
 * 
 * Loop through and display the Testimonial
 * Terms as menu items
 */

$active_class = '';
$animal = get_query_var( 'animal', '' );
if ( ! empty( $animal ) && $output->slug == $animal ) {
	$active_class = ' c-menu__item--active';
}
?>

<li class="c-menu__item<?php echo $active_class; ?>">

	<a href="/testimonials/<?php echo esc_attr( $output->slug ) ?>/">
		<?php echo esc_html( $output->name ); ?>
	</a>
</li>
