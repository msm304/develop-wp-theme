<div class="row">
        <!-- Cource Grid 1 -->
        <?php if(have_posts()): ?>
            <?php while (have_posts()) : the_post();?>
                <div class="col-lg-6 col-md-6">
                    <div class="education_block_grid">

                        <div class="education_block_thumb">
                            <a href="<?php the_permalink(); ?>"><?php echo dwt_post_thumbnail() ?></a>
                            <?php if (!empty(get_post_meta(get_the_ID(), '_dwt_post_cat'))) : ?>
                                <div class="topic_cat bg-warning text-white"><?php echo get_the_category_by_ID(get_post_meta(get_the_ID(), '_dwt_post_cat',true)) ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a></h4>
                            <p><?php echo PostExcerpt::dwt_excerpt_limit();?></p>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="<?php the_permalink(); ?>"><?php echo get_avatar(get_the_author_meta('user_email',get_the_author_ID()),38) ?></a></div>
                                <h5><?php the_author_posts_link(); ?></h5>
                            </div>
                            <span class="education_block_time ">
                        <?php
                        if (!empty(get_post_meta(get_the_ID(), '_dwt_post_level'))) {
                            switch (get_post_meta(get_the_ID(), '_dwt_post_level', true)) {
                                case 1:
                                    echo 'سطح : مقدماتی';
                                    break;
                                case 2:
                                    echo 'سطح : متوسط';
                                    break;
                                case 3:
                                    echo 'سطح : پیشرفته';
                            }
                        } ?>
                    </span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif;?>
    </div>
    <?php wp_reset_postdata(); ?>
<div class="text-center theme-pagination "><?php the_posts_pagination(); ?></div>
