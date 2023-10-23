<div class="container">
    <?php
    global $wp_query;
    ?>
    <span class="badge badge-light mb-5"><span class="text-primary"><?php echo $wp_query->found_posts ?></span> مطلب یافت شده برای عبارت <span class="text-primary"><?php echo $_GET['s'] ?></span></span>
    <div class="row">
        <!-- Cource Grid 1 -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="education_block_grid">

                        <div class="education_block_thumb">
                            <a href="course-detail.html"><?php echo dwt_post_thumbnail() ?></a>

                            <?php if (!empty(get_post_meta(get_the_ID(), '_dwt_post_cat', true))) : ?>
                                <div class="topic_cat bg-secondary text-white"><?php echo get_the_category_by_ID(get_post_meta(get_the_ID(), '_dwt_post_cat', true)) ?></div>
                            <?php endif; ?>

                        </div>
                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></h4>
                            <p class="text"><?php echo PostExcerpt::dwt_excerpt_limit() ?></p>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="instructor-detail.html"><?php echo get_avatar(get_the_author_meta('user_email'), 35) ?></a></div>
                                <h5><a href="instructor-detail.html"><?php echo get_the_author_meta('display_name') ?></a></h5>
                            </div>
                            <span class="education_block_time ">
                                <?php
                                if (!empty(get_post_meta(get_the_ID(), '_dwt_post_level', true))) {
                                    switch (get_post_meta(get_the_ID(), '_dwt_post_level', true)) {
                                        case 1:
                                            echo 'سطح : مقدماتی';
                                            break;
                                        case 2:
                                            echo 'سطح : متوسط';
                                            break;
                                        case 3:
                                            echo 'سطح : پیشرفته';
                                            break;
                                    }
                                }
                                ?>
                            </span>
                        </div>

                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="alert alert-info full-width text-center">نتیجه ای برای عبارت <span class="text-primary"><?php echo $_GET['s'] ?></span> یافت نشد.</div>
            <!-- Tags Cloud -->
            <div class="single_widgets widget_tags full-width border-0">
                <h4 class="title">تگ ها</h4>
                <?php if (function_exists('wp_tag_cloud')) : ?>
                    <ul>
                        <?php $tag_clouds = wp_tag_cloud('smallest=8&largest=14&format=array');
                        foreach ($tag_clouds as $tag_cloud) {
                            echo '<li>' . $tag_cloud . '</li>';
                        }
                        ?>
                    </ul>
                <?php else : ?>
                    <div class="alert alert-warning">تگی پیدا نشد !!!</div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata() ?>
    </div>
    <div class="text-center theme-pagination">
        <?php the_posts_pagination() ?>
    </div>
</div>