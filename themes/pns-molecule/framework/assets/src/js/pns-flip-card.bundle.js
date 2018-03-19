(function($) {

    'use strict';

    var card     = $( '.c-card--flip' );

    card.hover(function(){

        $(this).toggleClass('c-card--flip--is-flipped');

    });


}(jQuery));
