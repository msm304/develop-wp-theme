<?php
$args = [
    /* 'post_type' => ['post','tech'],*/
    'post_type' => ['post'],
    // 'posts_per_page' => 3,
    'showposts' => 3,
    //    'order'=>'asc'
];
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="singles_items ">
            <div class="edu_cat">
                <div class="pic">
                    <?php
                    if (!empty(get_post_meta(get_the_ID(), '_dwt_post_level', true))) {
                        switch (get_post_meta(get_the_ID(), '_dwt_post_level', true)) {
                            case 1:
                                echo '<div class="topic_level bg-info text-white">سطح : مقدماتی</div>';
                                break;
                            case 2:
                                echo '<div class="topic_level bg-warning text-white">سطح : متوسط</div>';
                                break;
                            case 3:
                                echo '<div class="topic_level bg-danger text-white">سطح : پیشرفته</div>';
                                break;
                        }
                    }
                    ?>
                    <?php if (!empty(get_post_meta(get_the_ID(), '_dwt_post_cat', true))) : ?>
                        <div class="topic_cat bg-secondary text-white"><?php echo get_the_category_by_ID(get_post_meta(get_the_ID(), '_dwt_post_cat', true)) ?></div>
                    <?php endif; ?>
                    <a class="pic-main" href="<?php echo get_the_title() ?>">
                        <?php echo dwt_post_thumbnail() ?>
                    </a>
                </div>
                <div class="edu_data singles_items_border_bottom">
                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a></h4>
                    <ul class="meta d-flex mt-4">
                        <li class="d-flex align-items-center"></i><?php echo get_the_author() ?></li>
                        <li class="video d-flex align-items-center"><i class="ti-video-clapper"></i>ویدئو</li>
                        <li class="video d-flex align-items-center"><i class="ti-eye"></i><?php echo PostView::dwt_get_post_view(get_the_ID()) ?></li>
                        <li class="d-flex align-items-center"><i class="ti-calendar theme-cl"></i><?php echo get_the_date('j F ماه Y') ?></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata() ?>
<?php else : ?>
    <div class="alert alert-info">تاکنون مطلبق منتشر نشده است</div>
<?php endif; ?>
<?php $the_query->rewind_posts(); ?>