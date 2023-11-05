<?php
$args = [
    'post_type' => ['tech'],
    'posts_per_page' => 3,
    'showposts' => 3,
];
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="articles_grid_style">
                <div class="articles_grid_thumb">
                    <a href="<?php echo get_the_permalink() ?>">
                        <?php echo dwt_post_thumbnail() ?>
                    </a>
                </div>
                <div class="articles_grid_caption">
                    <a href="<?php echo get_the_permalink() ?>">
                        <h4><?php echo get_the_title() ?></h4>
                    </a>
                    <div class="articles_grid_author">
                        <div class="articles_grid_author_img"><?php echo get_avatar(get_the_author_meta('user_email'), 40) ?></div>
                        <h4><?php echo get_the_author() ?></h4>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata() ?>
<?php else : ?>
    <div class="alert alert-info">تاکنون مطلبق منتشر نشده است</div>
<?php endif; ?>