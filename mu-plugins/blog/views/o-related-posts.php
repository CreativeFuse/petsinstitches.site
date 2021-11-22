<div class="o-section c-related-posts">
    <div class="o-container o-container--max">

        <div class="c-related-posts__title">
			<h5 class="c-related-posts__title-text e-h2 u-color--blue"><?= esc_html( $props['title'] ); ?></h5>
		</div>

        <div class="c-card__feed">
            <?php foreach( $props['posts'] as $id ){ ?>
                
                <?php

                    $post_date = get_the_date( 'F j, Y', $id );
                    /**
                     * We have to do some work to set up the images properly
                     */

                    $thumbnail_id = get_post_thumbnail_id( $id );

                    $thumbnail = \has_post_thumbnail( $id )
                        ? wp_get_attachment_image_src( $thumbnail_id, 'medium' )
                        : \get_field( 'blog_fallback_img', 'option' );

                    $thumbnail_url = \has_post_thumbnail( $id )
                        ? $thumbnail[0]
                        : $thumbnail['url'];

                    $thumbnail_width = \has_post_thumbnail( $id )
                        ? $thumbnail[1]
                        : $thumbnail['width'];


                    $thumbnail_height = \has_post_thumbnail( $id )
                        ? $thumbnail[2]
                        : $thumbnail['height'];

                    $thumbnail_alt = \has_post_thumbnail( $id )
                        ? \get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true )
                        : $thumbnail['alt'];


                ?>

                <a class="c-card c-card--post" href="<?= esc_url( get_permalink( $id ) ); ?>" data-event-origin=<?= "related-posts-{$props['current_post_id']}"; ?>>
                    <div class="c-card--post__header">
                        <div class="c-card--post__bg" style="background-image:url(<?= esc_url( $thumbnail_url ); ?>" alt="<?= esc_attr( $thumbnail_alt ); ?>" width="<?= esc_attr( $thumbnail_width ); ?>" height="<?= esc_attr( $thumbnail_height ); ?> )"></div>
                    </div>
                    
                    <div class="c-card--post__body">
                        <div class="c-title-group c-title-group--post">
                            <h2 itemprop="name headline" class="c-card--post__title c-title-group__title e-h3 u-color--blue">
                            <?= esc_html( get_the_title( $id ) ); ?>
                            </h2>
                        </div>
                        <div class="c-card--post__footer">
                            <p class="c-card--post__date c-title-group__sub e-p--small u-color--gray e-p--common">
                                <?php echo $post_date; ?>
                            </p>
                            <div class="post-arrow">
                                <img class="" style="" src="/wp-content/uploads/2021/10/next.png" />
                            </div>
                        </div>
                    </div>
                </a>

            <?php } ?>
        </div>

    </div>
</div>