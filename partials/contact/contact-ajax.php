<?php

add_action('wp_ajax_dwt_contact', 'dwt_contact');
add_action('wp_ajax_noprive_dwt_contact', 'dwt_contact');
function dwt_contact()
{
    if (!isset($_POST['nonce']) && !wp_verify_nonce($_POST['nonce'])) {
        die('access denied');
    }

    foreach ($_POST as $field) {
        if (empty($field)) {
            // dump error
            wp_send_json([
                'error' => true,
                'message' => 'تکمیل تمامی فیلدها الزامی می باشد !',
            ], 403);
            // return false;
        }
    }

    $recaptcha = $_POST['recaptcha'];
    $secret_key = '6LcmrfgoAAAAAAPaIwFicQ2qOZwd8VgEDwha8Zdu';
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
        . $secret_key . '&response=' . $recaptcha;

    $response = file_get_contents($url);
    $response = json_decode($response);

    if ($response->success !== true) {
        wp_send_json([
            'error' => true,
            'message' => 'تیک گزینه من ربات نیستم را انتخاب کنید',
        ], 403);
    }

    $full_name = sanitize_text_field($_POST['full_name']);
    $email = sanitize_text_field($_POST['email']);
    $title = sanitize_text_field($_POST['title']);
    $message = sanitize_textarea_field($_POST['message']);

    $header = ['Content-Type:text/html;charset=UTF-8'];

    //Send mail
    $send_mail = wp_mail('soltani5747@gmail.com', 'ایمیل آزمایشی', MailLayout::contact_layout($full_name, $email, $title, $message), $header);

    if ($send_mail) {
        wp_send_json([
            'success' => true,
            'message' => 'پیام شما با موفقیت ارسال گردید.',
        ], 200);
    } else {
        wp_send_json([
            'error' => true,
            'message' => 'خطا در ارسال ایمیل',
        ], 403);
    }
}
