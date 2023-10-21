<div class="single_article_pagination">
    <?php $previous_post = get_previous_post('true', '', 'category');
    if (!empty($previous_post)) : ?>
        <div class="prev-post">
            <a href="<?php echo get_permalink($previous_post->ID) ?>" class="theme-bg">
                <div class="title-with-link">
                    <span class="intro"><?php echo mb_substr($previous_post->post_title, 0, 20) . ' ' . '...' ?></span>
                </div>
            </a>
        </div>
    <?php endif; ?>

    <div class="article_pagination_center_grid">
        <a href="#"><i class="ti-layout-grid3"></i></a>
    </div>

    <?php $next_post = get_next_post('true', '', 'category');
    if (!empty($next_post)) : ?>
        <div class="next-post">
            <a href="<?php echo get_permalink($next_post->ID) ?>" class="theme-bg">
                <div class="title-with-link">
                    <span class="intro"><?php echo mb_substr($next_post->post_title, 0, 20) . ' ' . '...' ?></span>
                </div>
            </a>
        </div>

    <?php endif; ?>
</div>