<?php
function dwt_modify_author_query($query)
{
    if(is_main_query() && is_author()){
        set_query_var('post_type', ['post','tech']);
    };
}
add_action('pre_get_posts', 'dwt_modify_author_query' );