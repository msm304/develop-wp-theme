<?php

function register_sidebar_widgets()
{
    register_sidebar([
        'name' => 'my_thme_sidebar_cat',
        'id' => 'sidebar-1',
        'description' => 'سایدبار سفارشی قالب',
        'before_widget' => '<li id="%1s" class="%2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4 class="title">',
        'after_title' => '</h4>'
    ]);
    register_sidebar([
        'name' => 'my_thme_sidebar_hot_post',
        'id' => 'sidebar-2',
        'description' => 'سایدبار سفارشی ۲ قالب',
        'before_widget' => '<li id="%1s" class="%2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h4 class="title">',
        'after_title' => '</h4>'
    ]);
}
add_action('widgets_init', 'register_sidebar_widgets');

