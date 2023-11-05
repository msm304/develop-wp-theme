<?php

function dwt_register_more_setting()
{
    add_meta_box(
        'dwt_level',
        'تنظیمات بیشتر',
        'dwt_more_setting_html',
        '',
        'normal',
        'default'
    );
    add_meta_box(
        'dwt_post_types',
        'نوع محتوا',
        'dwt_post_types_html',
        '',
        'normal',
        'default'
    );
}
function dwt_more_setting_html($post)
{
    wp_nonce_field('post_level_nonce', 'post_level_nonces');
    wp_nonce_field('post_cat_nonce', 'post_cat_nonces');
?>
    <label for="post-level">سطح مقاله</label>
    <!-- <input type="text" value="<?php echo get_post_meta($post->ID, '_dwt_post_level', true) ?>" name="post_level" id="post-level" placeholder="سطح مقاله را وارد کنید"> -->
    <select name="post_level" id="post-level" style="width: 100%; margin-bottom: 20px;">
        <option value="1" <?php selected(get_post_meta($post->ID, '_dwt_post_level', true), 1) ?>>مقدماتی</option>
        <option value="2" <?php selected(get_post_meta($post->ID, '_dwt_post_level', true), 2) ?>>متوسط</option>
        <option value="3" <?php selected(get_post_meta($post->ID, '_dwt_post_level', true), 3) ?>>پیشرفته</option>
    </select>
    <label for="">دسته بندی مطلب</label>
    <?php
    if ($post->post_type == 'post') {
        wp_dropdown_categories([
            'name' => 'post_cat',
            'selected' => get_post_meta($post->ID, '_dwt_post_cat', true),
            'show_option_all'   => 'لطفا یک گزینه را انتخاب کنید',
            'show_count'        => 1,
        ]);
    }elseif($post->post_type == 'tech'){
        wp_dropdown_categories([
            'name' => 'post_cat',
            'selected' => get_post_meta($post->ID, '_dwt_post_cat', true),
            'show_option_all'   => 'لطفا یک گزینه را انتخاب کنید',
            'show_count'        => 1,
            'taxonomy' => 'tech',
        ]); 
    }

    ?>
<?php
}
function dwt_post_types_html($post)
{
    wp_nonce_field('post_types_nonce', 'post_types_nonces');
?>
    <label for="post-types" style="margin-bottom: 20px;">نوع مقاله</label>
    <select name="post_types" id="post-types" style="width:100%; margin: 10px 0;">
        <option value="1" <?php selected(get_post_meta($post->ID, '_dwt_post_types', true), 1) ?>>مقاله</option>
        <option value="2" <?php selected(get_post_meta($post->ID, '_dwt_post_types', true), 2) ?>>ویدیو</option>
        <option value="3" <?php selected(get_post_meta($post->ID, '_dwt_post_types', true), 3) ?>>پادکست</option>
    </select>
<?php
}
function save_meta_box($post_id)
{
    $post_level_nonce = $_POST['post_level_nonces'];
    $post_cat_nonce = $_POST['post_cat'];
    $post_types_nonce = $_POST['post_types'];
    if (!wp_verify_nonce($post_level_nonce, 'post_level_nonce') && !wp_verify_nonce($post_cat_nonce, 'post_cat_nonce') && !wp_verify_nonce($post_types_nonce, 'post_types_nonce')) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (!empty($_POST['post_level']) && !empty($_POST['post_cat']) && !empty($_POST['post_types'])) {
        $post_level = sanitize_text_field($_POST['post_level']);
        $post_cat = sanitize_text_field($_POST['post_cat']);
        $post_types = sanitize_text_field($_POST['post_types']);
        update_post_meta($post_id, '_dwt_post_level', $post_level);
        update_post_meta($post_id, '_dwt_post_cat', $post_cat);
        update_post_meta($post_id, '_dwt_post_types', $post_types);
    }
}
add_action('add_meta_boxes', 'dwt_register_more_setting');
add_action('save_post', 'save_meta_box');
