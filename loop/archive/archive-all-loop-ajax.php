<?php

add_action('wp_ajax_dwt_more_content', 'dwt_more_content');
add_action('wp_ajax_noprive_dwt_more_content', 'dwt_more_content');

function dwt_more_content()
{
    if (!isset($_POST['nonce']) && !wp_verify_nonce($_POST['nonce'])) {
        die('access denied');
    }
        $args = [
            'post_type' => $_POST['page_slug'],
            'posts_per_page' => 3,
            'paged' => /* $page */ $_POST['paged'],
            'status' => 'publish',
        ];
    // $page = (get_query_var('paged')) ? get_query_var('paged') : 1; 
    

    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        $html_output = '';
        while ($the_query->have_posts()) : $the_query->the_post();
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
            $html_output .=
                '<div class="col-lg-4 col-md-6">
            <div class="education_block_grid">

                    <div class="education_block_thumb">
                        <a href="' . get_the_permalink() . '">' . dwt_post_thumbnail() . '</a>
                        ' . $cat . '
                    </div>
                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
                        <p class="text">' . PostExcerpt::dwt_excerpt_limit() . '</p>
                    </div>

                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html">' . get_avatar(get_the_author_meta('user_email'), 35) . '</a></div>
                            <h5><a href="instructor-detail.html">' . get_the_author_meta('display_name') . '</a></h5>
                        </div>
                        <span class="education_block_time ">
                            ' . $level . '
                        </span>
                    </div>
                </div>
                </div>';
        endwhile;
    endif;
    wp_reset_postdata();
    wp_send_json([
        'content' => $html_output,
        'success' => true,
        'max_page' => $the_query->max_num_pages,
    ], 200);
}
