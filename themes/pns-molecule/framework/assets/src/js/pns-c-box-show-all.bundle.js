(function($) {

    'use strict';

    
    /**
     * Set GLobal Function Vars
     */

    // Elements
    var $trigger       = $( '.js-read-more' );

    /**
     * If we make it this far, continue on our way
     */

    $trigger.on('tap click', function(e){

        // Prevent default link click behavior
        e.preventDefault();

        var $content    = $(this).prev( '.c-box__content__holder' );
        var active      = 'c-box--is-active';
        var $button     = $(this).closest( '.c-btn' );

        if( $content.hasClass( active ) ){

            $content.removeClass( active );
            $button.html( 'Read More' );

        } else {

            $content.addClass( active );
            $button.html( 'See Less' );

        }

        
        

    });


}(jQuery));
