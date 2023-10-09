<?php

function theme_setup()
{
    add_filter('show_admin_bar', '__return_false');
    // register menu
    register_nav_menu('top nav', 'منو اصلی بالا سایت');
    // add thmbnail support
    add_theme_support('post-thumbnails');
    // crop upload image
    add_image_size('my-size', 200, 200, array('center', 'center'));
    // add nav walker menu class
    require_once get_template_directory() . '/class/nav-walker/WP_Bootstrap_Navwalker.php';
    

}
add_action('after_setup_theme', 'theme_setup');
