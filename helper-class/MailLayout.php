<?php
class MailLayout
{
    public static function contact_layout(string $full_name, string $email, string $title, string $message): string
    {
        return $email_layout = '
    <div style="background-color: #efefef;border: 1px solid #eee;text-align: right">
    <p style="font-size: 19px">ارسال کنند ایمیل : ' . $full_name . '</p>
    <p style="font-size: 19px">آدرس ایمیل : ' . $email . '</p>
    <p style="font-size: 19px">' . $title . '</p>
    <p style="font-size: 16px">' . $message . '</p>
</div>
    ';
    }

    /*    public static function payment_layout(string $payment_id) :string
    {
        return $email_layout = '
    <div style="background-color: #efefef;border: 1px solid #eee;text-align: right">
    <p style="font-size: 19px">شماره فاکتور : '. $payment_id .'</p>
    <p style="font-size: 16px">این یک ایمیل آزمایشی</p>
</div>
    ';
    }*/
}
