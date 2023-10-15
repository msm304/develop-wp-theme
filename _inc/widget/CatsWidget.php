<?php

class CatsWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(false, 'دسته بندی مطالب');
    }
    function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        } else {
            echo 'برای ویجت خود عنوان انتخاب کنید';
        }
        // echo 'دسته بندی ها‌';
        $args = [
            'title_li' => '',
            'depth' => 1,
            'show_count' => 1,
            'orderby' => 'name',
            'echo' => false,
            // 'order' => 'DESC',
        ];
        $variable = wp_list_categories($args);
        echo $args['after_widget'];
        $variable = preg_replace('~\((\d+)\)(?=\s*+<)~', '<span class="cat-count">$1</span>', $variable);
        echo $variable;
    }
    function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        // $instance['pass'] = (!empty($new_instance['pass'])) ? sanitize_text_field($new_instance['pass']) : '';

        return $instance;
    }
    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'عنوان پیشفرض';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان ویجت</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
            <!--  <label for="<?php /*echo esc_attr( $this->get_field_id( 'pass' ) ); */ ?>">کلمه عبور</label>
            <input class="widefat" id="<?php /*echo esc_attr( $this->get_field_id( 'pass' ) ); */ ?>" name="<?php /*echo esc_attr( $this->get_field_name( 'pass' ) ); */ ?>" type="text" value="<?php /*echo esc_attr( $pass ); */ ?>" placeholder="کلمه عبور وارد نمایید...">-->
        </p>
<?php
    }
}

function dwt_register_cat_widgets()
{
    register_widget('CatsWidget');
}

add_action('widgets_init', 'dwt_register_cat_widgets');
