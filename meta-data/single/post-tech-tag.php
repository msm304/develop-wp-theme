<div class="post-tags">
    <h4 class="pbm-title">تگ های این مطلب</h4>
    <ul class="list">
        <?php
        $post_tech_tags = get_the_terms($post->ID,'tech-tag');
        if ($post_tech_tags) :
            foreach ($post_tech_tags as $tag) :
                $tag_link = get_tag_link($tag->term_id);
        ?>
                <li><a href="<?php echo $tag_link ?>"><?php echo $tag->name ?></a></li>
            <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info text-center">تگی برای این مطلب وجود ندارد.</div>
        <?php endif; ?>
    </ul>
</div>