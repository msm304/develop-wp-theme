<?php

class HotPost extends WP_Widget
{
    function __construct()
    {
        parent::__construct(false, 'مطالب پر مخاطب');
    }
    function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        } else {
            echo 'برای ویجت خود عنوان انتخاب کنید';
        }
        echo $args['after_title'];
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 4,
            'orderby' => 'comment_count',
            'order' => 'DESC'
        ];
        $hot_post = new WP_Query($args);
        echo '<ul>';
        if ($hot_post->have_posts());
        while ($hot_post->have_posts()) : $hot_post->the_post();
?>
            <li>
                <span class="left">
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
                </span>
                <span class="right">
                    <a class="feed-title" href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                    <span class="post-date"><i class="ti-calendar"></i><?php echo TimeModify::time_ago($hot_post->post->post_date) ?></span>
                </span>
            </li>
        <?php
        endwhile;
        wp_reset_postdata();
        '</ul>';
        echo $args['after_widget'];
    }
    function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';


        return $instance;
    }
    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'عنوان پیشفرض';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان ویجت</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
<?php
    }
}

function dwt_register_hot_post_widgets()
{
    register_widget('HotPost');
}

add_action('widgets_init', 'dwt_register_hot_post_widgets');
