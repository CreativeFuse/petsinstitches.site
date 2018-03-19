<?php
// =============================================================================
// FRAMEWORK/VIEWS/CORE/_SITE-START.PHP
// -----------------------------------------------------------------------------
// Contians opening tags for the outer / inner site divs
// =============================================================================
?>
<body <?php body_class(); ?>>
  <?php do_action( 'molecule_after_body_begin' ); ?>
  <?php do_action( 'molecule_before_site_begin' ); ?>

  <div class="o-site">
    <?php do_action( 'molecule_after_site_begin' ); ?>