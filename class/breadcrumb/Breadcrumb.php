<?php

class Breadcrumb
{
    public static function get_breadcrumb()
    {
        echo '<li class="breadcrumb-item"><a href="'.home_url().'" rel=""nofollow>خانه</a></li>';
        if(is_category() || is_single() || is_archive()){
            echo '&nbsp;&#187;&nbsp;';
            // echo '<li>'.get_the_category_list('&bull;').'</li>';
            if(get_post_meta(get_the_ID(), '_dwt_post_cat', true) == ''){
                echo 'دسته بندی نشده';
            }else{
                echo '<li><a href="'.get_category_link(get_post_meta(get_the_ID(), '_dwt_post_cat', true)).'">'.get_the_category_by_ID(get_post_meta(get_the_ID(), '_dwt_post_cat', true)). '</li></a>';
            }
                if(is_single()){
                    echo " &nbsp;&#187;&nbsp; ";
                    the_title('<li>', '</li>', true);
                }
        } elseif(is_page()){
            echo '&nbsp;&#187;&nbsp;';
            the_title('<li>', '</li>', true);
        } elseif(is_search()){
            echo '&nbsp;&#187;&nbsp;';
            echo '<em>';
            echo the_search_query();
            echo '</em>';
        } elseif(is_404()){
            echo '&nbsp;&#187;&nbsp;';
            echo 'موردی یافت نشد';
        }
    }
}