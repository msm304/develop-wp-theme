<?php GoogleReferer::dwt_set_google_referer(get_the_ID(),$_SERVER['PHP_REFERER']) ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();
        PostVeiw::dwt_set_post_view(get_the_ID());
    ?>
        <div class="article_detail_wrapss single_article_wrap format-standard">
            <div class="article_body_wrap">

                <div class="article_featured_image">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('', [
                            'class' => 'img-responsive',
                            'alt' => get_the_title()
                        ]);
                    } else {
                        echo dwt_default_post_thumbnail();
                    }
                    ?>
                </div>

                <?php get_template_part('meta-data/single/post-meta', 'post-meta') ?>
                <?php the_content() ?>
                <div class="article_bottom_info">
                    <?php get_template_part('meta-data/single/post-tag', 'post-tag') ?>
                    <?php get_template_part('meta-data/single/post-share', 'post-share') ?>
                </div>
                <?php get_template_part('partials/single/pagination', 'pagination') ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>