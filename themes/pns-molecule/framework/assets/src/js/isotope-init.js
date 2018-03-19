(function($) {

	// init Isotope
	var $grid = $('.js-isotope-grid').isotope({
	  itemSelector: '.c-card--partner',
	  percentPosition: true,
	  masonry: {
	    // use outer width of grid-sizer for columnWidth
	    columnWidth: 550,
	    gutter: 0
	  },
	  stagger: 0,
	  transitionDuration: '0.3s',
	});
	
	// filter items on button click
	$('.js-partners-filter').on( 'click', 'button', function() {

	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });

	});


	// change is-checked class on buttons
	$('.c-partners__nav').each( function( i, buttonGroup ) {

	  var $buttonGroup = $( buttonGroup );

	  $buttonGroup.on( 'click', 'button', function() {

	    $buttonGroup.find('.c-menu__item--active').removeClass('c-menu__item--active');

	    $( this ).addClass('c-menu__item--active');

	  });

	});


}(jQuery));
