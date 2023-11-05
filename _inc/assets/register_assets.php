<?php

// add_action('wp_enqueue_scripts', 'register_jquery_in_footer');
// function register_jquery_in_footer()
// {
//     wp_dequeue_script('jquery');
//     wp_dequeue_script('jquery-core');
//     wp_dequeue_script('jquery-migrate');
//     wp_enqueue_script('jquery', false, [], false, true);
//     wp_enqueue_script('jquery-core', false, [], false, true);
//     wp_enqueue_script('jquery-migrate', false, [], false, true);
// }

add_action('wp_enqueue_scripts', 'register_assets');
function register_assets()
{
    // register styles
    // wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css','','4.5.3');
    // wp_enqueue_script('bootstrap');

    wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/assets/plugins/bootstrap.min.css', '', '4.5.1');
    wp_enqueue_style('bootstrap');

    wp_register_style('jquery-tost-plugin', get_stylesheet_directory_uri() . '/assets/css/jquery.toast.css', '', '1.3.1');
    wp_enqueue_style('jquery-tost-plugin');

    wp_register_style('main-style', get_stylesheet_directory_uri() . '/style.css', '', '1.0.0');
    wp_enqueue_style('main-style');

    wp_register_style('theme-colors', get_stylesheet_directory_uri() . '/assets/css/colors.css', '', '1.0.0');
    wp_enqueue_style('theme-colors');

    // register scripts
    wp_register_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('popper');

    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', '', '4.5.1', true);
    wp_enqueue_script('bootstrap');

    wp_register_script('select2', get_template_directory_uri() . '/assets/js/select2.min.js', '', '1.0.0', true);
    wp_enqueue_script('select2');

    wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.js', '', '1.0.0', true);
    wp_enqueue_script('slick');

    wp_register_script('jquery-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', '', '1.0.0', true);
    wp_enqueue_script('jquery-counterup');

    wp_register_script('counterup', get_template_directory_uri() . '/assets/js/counterup.min.js', '', '1.0.0', true);
    wp_enqueue_script('counterup');

    wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js', '', '1.0.0', true);
    wp_enqueue_script('custom');

    wp_register_script('jquery.toast', get_template_directory_uri() . '/assets/js/jquery.toast.js', ['jquery'], '1.3.1', true);
    wp_enqueue_script('jquery.toast');

    wp_register_script('recaptcha', 'https://www.google.com/recaptcha/api.js?hl=fa', '', '1.0.0', true);
    wp_enqueue_script('recaptcha');

    // wp_register_script('front-ajax', get_template_directory_uri() . '/assets/js/front-ajax.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('front-ajax', get_template_directory_uri() . '/assets/js/front-ajax.js', ['jquery'], '1.0.0', true);

    wp_localize_script('front-ajax', 'ajax', ['ajaxurl' => admin_url('admin-ajax.php'), '_nonce' => wp_create_nonce()]);
}
add_action('admin_enqueue_scripts', 'register_admin_assets');
function register_admin_assets()
{
    wp_register_style('bootstrap-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', '', '5');
    wp_enqueue_style('bootstrap-5');
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', '', '5.0.0', 'true');
    wp_register_script('bootstrap-js-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', '', '5.0.0', 'true');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap-js-5');
}
