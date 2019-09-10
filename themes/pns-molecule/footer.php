<?php
/**
 * FOOTER.PHP
 *
 * Renders all of the different footer views. These views also contain the necessary code
 * To close out the body and html tags etc
 *
 * @uses Molecule_Router::load_cta();to display the appropriate call to action*
 * @uses Molecule_Router::render() to laod views
 *
 * @since 1.0.0
 * @author CreativeFuse
 * @package wordpress
 */

?>
<?php

Molecule_Router::load_cta();
Molecule_Router::render( 'core', '_site', 'end' );


/**
 * Load site footer and footer content as long as we
 * are not using a landing page template.
 */

if( ! is_page_template( 'templates/landing.php' ) ){

    Molecule_Router::render( 'core', '_footer', 'start' );
    Molecule_Router::render( 'core', '_footer', 'content' );
    Molecule_Router::render( 'core', '_footer', 'end' );

}

/**
 * Load the Sticky Action Bar
 */

Molecule_Router::render( 'component', '_sticky', 'action-bar' );

wp_footer(); ?>

</body>
</html>
