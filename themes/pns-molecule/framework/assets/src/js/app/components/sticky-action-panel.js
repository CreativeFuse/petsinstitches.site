/**
 * After we scroll past the header on each page, let's
 * pop out out sticky action items
 */

;(function( $, window, document, undefined ){
	
	'use strict';  

        // Set our variables
        var $header         = $('.o-header');
        var $action_panel   = $('.c-action-panel');
        var $action_items   = $('.c-action-panel__item');
        var $last_item      = $action_items.length - 1;
        var $duration       = 300;

        /**
         * THe main handler for dealing with all of our transition animations!
         */

        var transitionAnimationHandler = function(){

            // When we scroll past the header, kick off our animations

            $(window).scroll(function () {

                if ($(this).scrollTop() > $header.height() ) {


                    activatePanel();
                    

                } else {

                    cascadeItemsOut();
                    
                }

            });
            

            // handle panel activation
            var activatePanel = function() {

                $action_panel.addClass("c-action-panel--visible");
                cascadeItemsIn();

            };


            // handle panel deactivation
            var deactivatePanel = function(){
                
                $action_panel.removeClass("c-action-panel--visible");
                

            };

            // handle item cascading effect
            var cascadeItemsIn = function(){

                // Loop through each action item
                $action_items.each( function(i){

                    // Set a variable for the current action item
                    var $item = $(this);

                    // For each item ,increase the duration before adding
                    // the appropriate class
                    setTimeout(function() {

                        $item.addClass("c-action-panel__item--visible");

                    }, $duration*i);

                });


            };


            // handle animating items out
            // see cascadeItemsIn for logic breakdown
            var cascadeItemsOut = function(){

                $action_items.each( function(i){

                    var $item = $(this);

                    setTimeout(function() {

                        $item.removeClass("c-action-panel__item--visible");

                        if( i == $last_item ){

                            deactivatePanel();

                         }

                    }, $duration*i );

                    // If there are no more items
                    // remove the active panel class

                });

            };


        }; // End Transition Handler



        /**
         * Handle THe hover effect for our action items
         */
        var hoverHandler = function(){

            // Hover Handler
            $action_items.hover(function(){

                $(this).toggleClass('c-action-panel__item--active');

            });

        };   

    $(document).ready( function() {
        
            transitionAnimationHandler();
            hoverHandler();

    });
        


})( jQuery, window, document );