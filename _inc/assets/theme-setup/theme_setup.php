<?php

function theme_setup()
{
    add_filter('show_admin_bar', '__return_false');
    // register menu
    register_nav_menu('top nav', 'منو اصلی بالا سایت');
}
add_action('after_setup_theme', 'theme_setup');
