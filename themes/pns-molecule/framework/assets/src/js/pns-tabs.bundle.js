(function($) {

    'use strict';

    $('.c-tabs').tabtab({

        tabMenu: '.c-tabs__menu',             // direct container of the tab menu items
        tabContent: '.c-tabs__panels',       // direct container of the tab content items
        next: '.c-tabs__controls__next',       // next slide trigger
        prev: '.c-tabs__controls__prev',       // previous slide trigger

        startSlide: 1,                      // starting slide on pageload
        arrows: false,                       // keyboard arrow navigation
        fixedHeight: false,                // if true the height will dynamic and animated.
        useAnimations: true,                // disables animations.

        easing: 'ease',                     // http://julian.com/research/velocity/#easing
        speed: 450,                         // animation speed
        slideDelay: 200,                      // delay the animation
        perspective: 1200,                  // set 3D perspective
        transformOrigin: 'center',          // set the center point of the 3d animation
        perspectiveOrigin: '50% 50%',       // camera angle

        translateY: 0,                      // animate along the Y axis (val: px or ‘slide’)
        translateX: 1500,                     // animate along the X axis (val: px or ‘slide’)
        scale: 1,                           // animate scale (val: 0-2)
        rotateX: 0,                        // animate rotation (val: 0deg-360deg)
        rotateY: 0,                         // animate Y acces rotation (val: 0deg-360deg)
        skewY: 0,                           // animate Y skew (val: 0deg-360deg)
        skewX: 0,                           // animate X skew (val: 0deg-360deg)

    });

    // Set initial tab height and initial panel position
    // to make sure it responds to accordions opening and closing
    $( document ).ready(function() {
        $(".o-panel[aria-hidden='false']").css('position', 'relative');
        $(".o-panel[aria-hidden='true']").css('top', '0');
        $(".js-tabs-height").css('height', '100%');
    });

}(jQuery));
