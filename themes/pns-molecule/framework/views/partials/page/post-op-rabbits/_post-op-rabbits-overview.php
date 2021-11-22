<?php

$postopcare = CreativeFuse\PetsInStitches\PostOpInstructions\get_postopcare();
$categoryOverview = category_description(186);
$anchorMenu[0] = array(
  'title' => 'Overview',
  'link' => '#overview'
);
$postIds = array_keys($postopcare[186]['records']);
// var_dump($postIds);
foreach ($postopcare[186]['records'] as $recordId => $record) {
  $anchorMenu[$recordId] = array(
    'title' => $record['record_title'],
    'link' => '#' . $record['record_slug']
  );
}
?>


	<div class="o-container o-container--max" style="margin-top:50px;">

		<div class="o-row">

			<div class="o-col-md-8">

				<div id="overview" class="overview" style="border-bottom: 2.5px solid #ededed">

					<h2 class="secondary-heading-xl c-title-group__title u-color--blue">Overview</h2>
					<div class="e-p--common-subsection">
						<?php echo $categoryOverview; ?>
          </div>
          
				</div>
        <div class="mobileAnchorMenu">
            <p class="e-p--common-subsection c-title-group__sub">
              Use these quick links to navigate to specific sections.
            </p>
            <div class="facetwp-facet facetwp-type-dropdown" data-type="dropdown">
              <select class="facetwp-dropdown" onchange="location = this.value;">
                <?php foreach ($anchorMenu as $key => $link) { ?>
                  <option value="<?php echo $link['link']; ?>"><?php echo $link['title']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        <?php 
          foreach ($postopcare[186]['records'] as $recordId => $record){?>
            <div id="<?php echo $record['record_slug']; ?>" class="post-op-section <?php echo $record['record_slug']; ?>" style="">
              <h2 class="secondary-heading-xl c-title-group__title u-color--blue"><?php echo $record['record_title']; ?></h2>
              <?php
                  if( have_rows('content',$recordId) ){
                    while ( have_rows('content',$recordId) ) : the_row();
                      if( get_row_layout() == 'general_care' ){
                        if( have_rows('general_care_block') ){
                          while ( have_rows('general_care_block') ) : the_row();
                            Molecule_Router::render( 'page/post-op-rabbits', '_post-op-rabbits', 'section' );
                          endwhile;
                        }
                      }elseif( get_row_layout() == 'incision_care' ){
                        if( have_rows('incision_care_block') ){
                          while ( have_rows('incision_care_block') ) : the_row();
                            Molecule_Router::render( 'page/post-op-rabbits', '_post-op-rabbits', 'section' );
                          endwhile;
                        }
                      }elseif( get_row_layout() == 'healing_process' ){
                        if( have_rows('healing_process_block') ){
                          while ( have_rows('healing_process_block') ) : the_row();
                            Molecule_Router::render( 'page/post-op-rabbits', '_post-op-rabbits', 'section' );
                          endwhile;
                        }
                      }elseif( get_row_layout() == 'general__paragraph' ){
                        ?>
                          <div class="post-op-subsection">
                            <div class="e-p--common-subsection">
                              <?php echo get_sub_field('paragraph_block'); ?>
                            </div>
                          </div>
                        <?php
                      }elseif( get_row_layout() == 'faqs' ){
                        ?>
                          <div class="post-op-subsection">
                            <h3 class="secondary-heading-m">
                              <span><?php echo get_sub_field('title'); ?></span>
                            </h3>
                            <?php
                              $postop_faqs = get_sub_field('related_faqs');
                              // Build array for _faq-accordion.php
                              foreach ($postop_faqs as $faq) {
                                $postop_faq = array(
                                  'faq_id' 	=> $faq->ID,
                                  'faq_title'	=> $faq->post_title
                                );
                                // Each item rendered uses the following component
                                Molecule_Router::render( 'post/faqs', '_faq', 'accordion', $postop_faq );
                              }
                            ?>
                          </div>
                        <?php
                        
                      }elseif( get_row_layout() == 'posts' ){ ?>
                        <div class="post-op-subsection">
                            <h3 class="secondary-heading-m">
                              <span><?php echo get_sub_field('title'); ?></span>
                            </h3>
                          <div class="c-card__feed">
                            <?php
                              // print("<pre>".print_r(get_sub_field('related_posts'),true)."</pre>");
                              $related_posts = get_sub_field('related_posts');
                              foreach ($related_posts as $post) {
                                // Each item rendered uses the following component
                                Molecule_Router::render( 'page/post-op-rabbits', '_post-op-rabbits', 'blog-posts', $post );
                              }
                            ?>
                          </div>
                        </div>
                        <?php
                      }
                        
                    endwhile;
                  }
              ?>
            </div>
          <?php }
        ?>

			</div>
      <div class="o-col-md-4 stickyAnchorMenu" style="">
        <div class="anchorMenu">
          <p class="e-p--common-subsection c-title-group__sub">
						Use these quick links to navigate to specific sections.
          </p>
          <ul class="e-p--common-subsection">
            <?php foreach ($anchorMenu as $key => $link) { ?>
              <li><a href="<?php echo $link['link']; ?>"><?php echo $link['title']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>

		</div>

	</div>