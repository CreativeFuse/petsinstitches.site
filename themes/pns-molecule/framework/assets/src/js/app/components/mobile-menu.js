
(function($) {


	// Hamburger Icon Click function
	$(document).ready(function(){
		$('.c-icon--mobile').on("tap click", function(){

			$(this).toggleClass('open');
			$('body').toggleClass( 'mobile-menu--open' );
			$('.o-mobile-menu').toggleClass('o-mobile-menu--visible');

		});
	});

	// Menu Accordion function
	$('.o-mobile-menu__menu-item-toggle').click(function(e) {
	  	e.preventDefault();
	  
	    var $this = $(this);
	  
	    if ($this.next().hasClass('show')) {
	        $this.next().removeClass('show');
	        $this.next().slideUp(350);
	    } else {
	        $this.parent().parent().find('.o-mobile-menu__item-inner').removeClass('show');
	        $this.parent().parent().find('.o-mobile-menu__item-inner').slideUp(350);
	        $this.next().toggleClass('show');
	        $this.next().slideToggle(350);
	    }
	});

}(jQuery));