<?php

class GoogleReferer
{
    public static function dwt_set_google_referer($postID, $url)
    {
        if (stripos($url, 'https://www.google.com')) {
            $google_referer_key = '_google_referer_nums';
            $google_referer_key_nums = get_post_meta($postID, $google_referer_key, true);
            if (!metadata_exists('post', $postID, $google_referer_key)) {
                add_post_meta($postID, $google_referer_key, 1);
            } else {
                $google_referer_key_nums++;
                update_post_meta($postID, $google_referer_key, $google_referer_key_nums);
            }
        }
    }

    public static function dwt_get_google_referer($postID)
    {
        $google_referer_key = '_google_referer_nums';
        $google_referer_key_nums = get_post_meta($postID, $google_referer_key, true);
        if (!metadata_exists('post', $postID, $google_referer_key)) {
            return 0;
        } else {
            return $google_referer_key_nums;
        }
    }
}
