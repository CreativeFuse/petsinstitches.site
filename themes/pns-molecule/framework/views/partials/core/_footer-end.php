<?php

// =============================================================================
// FRAMEWORK/VIEWS/CORE/_FOOTER-END.PHP
// -----------------------------------------------------------------------------
// Closes the footer
// Includes the wp_footer() hook and closes out the <body> and <html> tags.
// =============================================================================

// Copyright Variables

?>
	
	<div class="o-col-md-12">

	    <div class="c-copyright">

	       <p class="e-p--small c-copyright__content u-color--blue-l"><?php Molecule_Display::copyright(); ?></p>

	    </div>

    </div><!-- .site-copyright-->

</div><!-- .container -->

</footer>

<?php do_action( 'molecule_after_footer' ); ?>

 </div> <!-- END #site.top -->

 <?php do_action( 'molecule_after_site_end' ); ?>

<?php wp_footer(); ?>

</body>
</html>