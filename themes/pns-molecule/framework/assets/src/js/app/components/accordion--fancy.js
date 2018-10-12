import velocity from 'velocity-animate';

(function($) {

    'use strict';

	/**
	 * Set GLobal Function Vars
	 */

	// Elements
	var $accordion				= $( '.c-accordion--fancy' );
	var $accordionBody			= $( '.c-accordion--fancy__body' );


	/**
	 * If we click the accordion body, stop everything!
	 */
	$accordionBody.click(function(e){
		e.preventDefault();
     	e.stopPropagation();
 	});


	/**
	 * If we make it this far, continue on our way
	 */

	$accordion.on('tap click', function(e){


		// Prevent default link click behavior
		e.preventDefault();

		var $accordionIcon			= $(this).find( '.c-accordion__icon' );
		var $accordionBody			= $(this).find( '.c-accordion--fancy__body' );

		// State Classes
		var	active				= 'c-accordion--is-active';
		var	expanded			= 'c-accordion--is-expanded';

		var isOpen = $accordionBody.is(':visible');
		var	slideDir = isOpen ? 'slideUp' : 'slideDown';
		var	dur = isOpen ? 300 : 300;


		/**
		 * Using Velocity JS, we will handle the animation
		 * of our accordion!
		 */

		$accordionBody.velocity ( slideDir, {

		// Our accordion has been clicked
		  begin: function(){
		  	$(this).closest( $accordion ).toggleClass( active );
		  },

	      easing: 'ease',

	      duration: dur,

	      // Our Accordion is fully expanded
	      complete: function() {
	      	$(this).closest( $accordion ).toggleClass( expanded );
	      }

	    });


	});


}(jQuery));