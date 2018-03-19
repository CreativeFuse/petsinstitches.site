<?php
// =============================================================================
// FRAMEWORK/VIEWS/CORE/_MENU-PRIMARY-BOTTOM.PHP
// -----------------------------------------------------------------------------
// This file contains the function to output cfi's Primary Menu
// Note that this file isn't used for the output.
// It is called in the navbar-main file after a has_nav check is run
// =============================================================================

wp_nav_menu(
	array(

		'theme-location' 	=> 'primary',
		'menu_class' 	 	=> 'c-menu c-menu--primary u-pull--right',
		'container' 	 	=> false,
    	'menu_id'        	=> 'primary-menu',
    	'echo'              => true,
    	'fallback_cb'       => 'wp_page_menu',
    	'before'            => '',
	    'after'             => '',
	    'link_before'       => '',
	    'link_after'        => '',
	    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	    'depth'             => 0,
	    'walker'            => new Molecule_Mega_Menu()
	    
	)
);

?>