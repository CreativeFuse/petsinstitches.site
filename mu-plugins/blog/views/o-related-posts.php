<div class="o-section c-related-posts">
    <div class="c-related-posts__container o-container o-container--max o-container--width">

        <div class="c-related-posts__title">
			<h5 class="c-related-posts__title-text e-h2 u-color--blue"><?= esc_html( $props['title'] ); ?></h5>
		</div>

        <div class="c-related-posts__items">
            <?php foreach( $props['posts'] as $id ){ ?>

                <?php

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

                <a class="c-related-post__item" href="<?= esc_url( get_permalink( $id ) ); ?>" data-event-origin=<?= "related-posts-{$props['current_post_id']}"; ?>>

                    <div class="c-related-post__item__media">
                        <img class="c-related-post__item__image" src="<?= esc_url( $thumbnail_url ); ?>" alt="<?= esc_attr( $thumbnail_alt ); ?>" width="<?= esc_attr( $thumbnail_width ); ?>" height="<?= esc_attr( $thumbnail_height ); ?>">
                    </div>

                    <div class="c-related-post__item__body">
                        <h6 class="c-related-post__item__title e-h6 u-color--gray"><?= esc_html( get_the_title( $id ) ); ?></h6>
                    </div>

                </a>

            <?php } ?>
        </div>

    </div>
</div>