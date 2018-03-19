<?php

/**
 * Welcome to Melecule, a powerful starter theme built with OOP.
 * 
 * Our Functions.php file is only serving 2 purposes:
 *
 * 1. Require our main class, Molecule
 * 2. Instantiate that class with a function.
 *
 * All other functionality is pulled into our project via classes.
 * 
 */


if( ! class_exists( 'Molecule' ) ){

	/**
	 * Require our main class, Molecule.
	 *
	 * @since  1.0.0
	 */

	require_once ( get_template_directory() . '/framework/classes/class.molecule.php' );


	/**
	 * molecule()
	 *
	 * The main function responsible for returning the one true acf Instance to functions everywhere.
	 * Use this function like you would a global variable, except without needing to declare the global.
	 *
	 * This function was taken from how ACF loads its main instance.
	 *
	 * Example: <?php $moleucle = molecule(); ?>
	 *
	 * @since	1.0.0
	 *
	 * @return	(object)
	 */
  
	function molecule() {

		global $molecule;

		if( !isset($molecule) ) {

			$molecule = new Molecule();
			$molecule->initialize();

		}

		return $molecule;

	}

	molecule();

}