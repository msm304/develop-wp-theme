<?php

function mailtrap($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '49ecf83b726598';
    $phpmailer->Password = 'e1fe724aba54d9';
}

add_action('phpmailer_init', 'mailtrap');

