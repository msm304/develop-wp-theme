<?php

function add_tinymce_plugin_js($array)
{
    $array['video'] = get_template_directory_uri() . '/assets/js/tinymce-buttons.js';
    $array['quote'] = get_template_directory_uri() . '/assets/js/tinymce-buttons.js';
    return $array;
}

add_filter('mce_external_plugins', 'add_tinymce_plugin_js');

function register_custom_button_for_tinymce($buttons)
{
    array_push($buttons, 'video', 'quote');
    return $buttons;
}

function format_tinymce($in)
{
    $in['toolbar1'] = 'bold,hr,blockquote,video,quote';
    return $in;
}

add_filter('mce_buttons', 'register_custom_button_for_tinymce');
add_filter('tiny_mce_before_init', 'format_tinymce');
