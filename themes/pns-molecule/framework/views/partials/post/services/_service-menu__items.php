<?php
/**
 * Service • Menu items
 * 
 * Loop through and display the Services
 * Parent Terms as menu items
 */
$active_class = '';
$animal = get_query_var( 'animal', '' );
if ( ! empty( $animal ) && $output['term_slug'] == $animal ) {
	$active_class = ' active_menu_item';
}
?>
<li class="c-menu__item<?php echo $active_class; ?>"><a href="#<?php echo esc_attr( $output['term_slug'] ); ?>"><?php echo esc_html( $output['term_name'] ); ?></a></li>
