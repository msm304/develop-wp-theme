<div class="row">
    <?php
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = [
        'post_type' => ['tech'],
        'posts_per_page' => 3,
        'paged' => $page,
        'status' => 'publish',
    ];
    $the_query = new WP_Query($args);
    query_posts($args);
    update_option('_dwt_tech_post_num', $the_query->found_posts);

    if (have_posts()) :
        while (have_posts()) : the_post();
            if (!empty(get_post_meta(get_the_ID(), '_dwt_post_cat', true))) {
                $cat = '<div class="topic_cat bg-secondary text-white">' . get_the_category_by_ID(get_post_meta(get_the_ID(), '_dwt_post_cat', true)) . '</div>';
            }

            if (!empty(get_post_meta(get_the_ID(), '_dwt_post_level', true))) {
                switch (get_post_meta(get_the_ID(), '_dwt_post_level', true)) {
                    case 1:
                        $level = 'سطح : مقدماتی';
                        break;
                    case 2:
                        $level = 'سطح : متوسط';
                        break;
                    case 3:
                        $level = 'سطح : پیشرفته';
                        break;
                }
            }
            // if (!empty(get_post_meta(get_the_ID(), '_dwt_post_types'))) {
            //     switch (get_post_meta(get_the_ID(), '_dwt_post_types', true)) {
            //         case 1:
            //             $type = '<span class="post-type-icon position-absolute"><i class="fas fa-file-alt"></i></span>';
            //             break;
            //         case 2:
            //             $type = '<span class="post-type-icon position-absolute"><i class="fas fa-play-circle"></i></span>';
            //             break;
            //     }
            // }
    ?>

            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid">
                    <div class="education_block_thumb position-relative">
                        <a href="<?php echo get_the_permalink() ?>"><?php echo dwt_post_thumbnail() ?></a>
                        <?php echo $cat ?>
                        <!-- <?php /* echo $type  */ ?> -->
                    </div>
                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="<?php echo get_the_permalink() ?>"> <?php echo get_the_title() ?></a></h4>
                        <p><?php echo PostExcerpt::dwt_excerpt_limit() ?></p>
                    </div>

                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="<?php echo get_the_permalink() ?>"><?php echo get_avatar(get_the_author_meta('user_email', get_the_author_ID()), 38) ?></a>
                            </div>
                            <h5><?php echo get_the_author_posts_link() ?></h5>
                        </div>
                        <span class="education_block_time ">

                            <?php echo $level ?>
                        </span>
                    </div>
                </div>

            </div>
    <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>

</div>
<div class="text-center theme-pagination">
    <?php the_posts_pagination() ?>
</div>