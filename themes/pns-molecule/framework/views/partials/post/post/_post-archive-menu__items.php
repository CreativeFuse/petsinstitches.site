<?php
/**
 * Post Archive • Menu items
 * 
 * Loop through and display the Category
 * Terms as menu items
 */

$active_class = '';

// Get the category object
$category = get_queried_object();


// If the category object slug equals the current iterated menu item slug, set it to active
if ( ! empty( $category->slug ) && $output->slug == $category->slug ) {

	$active_class = ' c-menu__item--active';

}

?>

<li class="c-menu__item<?php echo $active_class; ?>">

	<a href="/category/<?php echo esc_attr( $output->slug ) ?>/">
		<?php echo esc_html( $output->name ); ?>
	</a>
</li>
