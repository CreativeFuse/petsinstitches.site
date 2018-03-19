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
Molecule_Router::render( 'core', '_footer', 'start' );
Molecule_Router::render( 'core', '_footer', 'content' );
Molecule_Router::render( 'core', '_footer', 'end' );