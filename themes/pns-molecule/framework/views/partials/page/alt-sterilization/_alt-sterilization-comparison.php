<?php

$page = 'alternative_sterilization_comparison';
$group = get_field( $page );

// If the grpup has Data
if ( $group ) { ?>

	<div class="o-section o-section--sub-page">
		<div class="o-container o-container--max--small">
		<?php
			// Build Page Sections
			if( have_rows( $page ) ) {
				while( have_rows( $page ) ) {
					the_row();
					if ( 'comparison' == get_row_layout() ) {
						?><div class="comparison"><?php
						while ( have_rows( 'comparison_title' ) ) {
							the_row();
							$title1 = get_sub_field( 'comparison_title_1' );
							$title2 = get_sub_field( 'comparison_title_2' );
							?>
							<div class="comparison-title">
								<h3><?php esc_html_e($title1); ?></h3>
								<h3><?php esc_html_e($title2); ?></h3>
							</div>
						<?php }
						if ( have_rows( 'comparison_sub_title' ) ) {
							while ( have_rows( 'comparison_sub_title' ) ) {
								the_row(); ?>
								<div class="comparison-sub-title">
									<div><?php esc_html_e(get_sub_field('comparison_sub_title_1')); ?></div>
									<div><?php esc_html_e(get_sub_field('comparison_sub_title_2')); ?></div>
								</div>
							<?php }
						}
						$row_class = 'odd';
						while ( have_rows( 'comparison_item' ) ) {
							the_row(); ?>
							<div class="comparison-items <?php echo $row_class; ?>">
								<div data-title="<?php esc_attr_e($title1); ?>">
									<?php echo wp_kses_post(get_sub_field('comparison_item_1')); ?>
								</div>
								<div data-title="<?php esc_attr_e($title2); ?>">
									<?php echo wp_kses_post(get_sub_field('comparison_item_2')); ?>
								</div>
							</div>
							<?php $row_class = $row_class === 'odd' ? 'even' : 'odd';
						}
						?></div><?php
					} else if ( 'collapsible_list' === get_row_layout() ) { ?>
						<div class="c-accordion c-accordion--simple c-accordion--simple--1">
							<div class="c-accordion--simple__header">
								<h5 class="e-h6 c-accordion--simple__header__title u-text-up"><?php esc_html_e( get_sub_field( 'title' ) ); ?></h5>
								<div class="c-accordion__icon c-accordion__icon--simple">
									<div class="c-accordion__icon-bar c-accordion__icon-bar--1"></div>
									<div class="c-accordion__icon-bar c-accordion__icon-bar--2"></div>
								</div>
							</div>
							<div class="c-accordion--simple__body u-clearfix">
								<?php
								// If there is detail
								$detail = get_sub_field( 'detail' );
								if ( $detail ) { ?>
									<p class="e-p--common c-title-group__sub"><?php echo wp_kses_post( $detail ); ?></p>
								<?php } ?>
								<div class="o-col-md-12">
									<ul class="c-list-paws c-list-paws--blue">
										<?php while( have_rows( 'items' ) ) {
											the_row();
											// Set variables in loop
											$item = get_sub_field( 'list_item', false, false ); ?>
											<li class="e-p--common c-list-paws__item u-max-width--700"><?php echo wp_kses_post( get_sub_field( 'item' ) ); ?></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					<?php } else if ( 'latest_articles' === get_row_layout() ) { ?>
						<div class="c-latest-articles">
							<div class="header">
								<h2 class="title c-title-group__title e-h2 u-color--blue u-align--center"><?php esc_html_e( get_sub_field( 'title' ) ); ?></h2>
								<p class="c-title-group__sub__sub e-p--common u-max-width--600"><?php esc_html_e( get_sub_field( 'description' ) ); ?></p>
							</div>
							<div class="articles">
								<?php
									while ( have_rows( 'articles' ) ) {
										the_row();
								?>
									<div class="article">
										<?php
											$image       = get_sub_field( 'image' );
											$link        = get_sub_field( 'link' );
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
											<div class="image"><?php if( $image ) { echo wp_get_attachment_image( $image, [300,300] ); } ?></div>
											<div class="title"><?php echo esc_html( $link['title'] ); ?></div>
										</a>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php }
				}
			} ?>
		</div>
	</div>
<?php } ?>
