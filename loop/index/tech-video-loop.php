<?php
add_action('wp_ajax_video', 'video');
add_action('wp_ajax_nopriv_video', 'video');
function video()
{
    if (!wp_verify_nonce($_POST['nonce']))
        die('accecs denied !!!');
    $args = [
        'post_type' => ['tech'],
        //        'post_per_page' => 3,
        'showposts' => 3,
        'tax_query' => [
            [
                'taxonomy' => 'tech',
                'field' => 'slug',
                'terms' => 'video'
            ]
        ],
        'order' => 'DESC'
    ];

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) :
        $html_output = '';
        while ($the_query->have_posts()) : $the_query->the_post();
            $html_output .= '<div class="col-lg-4 col-md-4 col-sm-12">
            <div class="articles_grid_style">
                <div class="articles_grid_thumb">
                    <a href="' . get_the_permalink() . '">
                        '. dwt_post_thumbnail() .'
                    </a>
                </div>
                <div class="articles_grid_caption">
                    <h4>' . get_the_title() . '</h4>
                    <div class="articles_grid_author">   
                        <div class="articles_grid_author_img">' . get_avatar(get_the_author_meta('user_email'), 40) . '</div>
                        <h4>' . get_the_author() . '</h4>
                    </div>
                </div>
            </div>
        </div>';
        endwhile;
    endif;
    wp_reset_postdata();
    wp_send_json([
        'content' => $html_output, 
        'success' => true
    ], 200);
}