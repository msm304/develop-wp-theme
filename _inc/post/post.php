<?php
// default image for posts
function dwt_default_post_thumbnail()
{
    $thumb_logo = get_template_directory_uri() . '/assets/image/thumb-logo.jpg';
    return "<img class='img-responsive' src='$thumb_logo' alt='image'>";
}