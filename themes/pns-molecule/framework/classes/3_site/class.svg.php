<?php

/**
 * This class handles all of the custom queries for our theme.
 *
 * @link       http://creativefuse.org/
 * @since      1.0.0
 *
 * @package    Molecule
 * @subpackage Molecule/site
 * @author     CreativeFuse <support@creativefuse.org>
 */
class Molecule_SVG {


	/**
	 * When our class is instantiated, we will...
	 *
	 * @since  1.0.0
	 */

	public function inject_sprite(){

        //  Check to see if our sprite exists & set it
        //  if it does
        $sprite = Manifest::get_asset('sprite.svg', false) ?? null;

        // Bail if it doesn't
        if( ! file_exists( $sprite ) )
            return;

        ?>
            <!-- SVG Sprite Definitions -->
            <div class="fuse--sprite-defs" style="display:none;">
                <?php
                    // Include our SVG Sprite
                    include $sprite;
                ?>
            </div>

    <?php }

}
