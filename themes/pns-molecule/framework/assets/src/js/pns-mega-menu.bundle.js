jQuery(document).ready(function ($) {

	/**
	 * Set GLobal Function Vars
	 */

	// Elements
	var trigger 			= $( '.js-trigger-mega' );
	var	MegaMenu 			= $( '.o-mega' );
	var	panelVisible 		= $( '.o-mega--active' );
	var	hasActiveMega 		= $( '.has-mega--active' );

	// State Classes
	var	showMega			= 'o-mega--active';
	var	setActiveMega       = 'has-mega--active';
	var noTransition		= 'no-transition';


	/**
	 * Handle our event trigger click
	 */


 	$('.js-trigger-mega').on('tap click', function(e){


		e.preventDefault();


		// Remove classes from any mega menu other than the mega menu
		// that was just clicked

		if( trigger.not(this).hasClass( setActiveMega  ) ){

			MegaMenu.not(this).removeClass( showMega );
			trigger.not(this).removeClass( setActiveMega );

		}

		// Set active classes on the mega  menu that was just clicked
		
		$(this).toggleClass( setActiveMega );
	 	$(this).next( MegaMenu ).toggleClass( showMega );  // apply the toggle to the ul


	});

 	/**
 	 * Do not close SubMenu when clicked - prevent state chenge if we click inside the submenu
 	 * but remove all classes if we click outside of it
 	 */
 	$(document).on('click', function(e) {

		if ( ( ! MegaMenu.is(e.target) ) && ( MegaMenu.has(e.target).length=== 0 ) && ( $(e.target).closest( trigger ).length === 0 ) ) {

       		 MegaMenu.removeClass( showMega );
       		 trigger.removeClass( setActiveMega );

       	}


     });


});