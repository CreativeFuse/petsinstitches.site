import throttle from 'lodash.throttle';

// Get initial elements
const header = document.querySelector( '.o-header' );
const actionBar = document.querySelector( '.c-action-bar' );


/**
 * Get an element's current position from the top of the window.
 *
 * @param {*} element - the element we want to get the page position of
 */
const getElementPagePosition = ( element ) => {

	return element.offsetTop + element.offsetHeight;

}

/**
 * Has the user scrolled passed the instance of the defined element?
 *
 * @param {*} element - the element to check
 */
const isScrolledPastElement = ( element ) => {

	return window.scrollY > getElementPagePosition( element )

}

/**
 * Add and remove the necessary classes based on current scroll position
 */
const handleActionBarToggle = () => {

	return isScrolledPastElement( header )
		? actionBar.classList.add( '--is-active' )
		: actionBar.classList.remove( '--is-active' );

}

const maybeHideActionBar = () => {

	if( actionBar ){
		actionBar.style.display= 'none' ;
	}

}

/**
 * Only fire off the functionality if both dependencies exist.
 */
const initIfDependenciesExist = () => {

	return ( header && actionBar )
		? handleActionBarToggle()
		: maybeHideActionBar();

}


// Handle initial load state
window.addEventListener( 'load', () => {

	initIfDependenciesExist();

});

// Handle Scroll Events
window.addEventListener( 'scroll', throttle( () => {

	initIfDependenciesExist();

}, 100 ));
