<?php

function free_video_shortcodes($atts, $content = null)
{
    return '
    <video id="my-video" class="video-js video-js-free-course" controls poster="' . $atts['pos'] . '" preload="auto" width="100%" height="auto"
                           poster="img/cafeamoozesh-logo.png" data-setup="{}">
                        <source src="' . $atts['src'] . '" type=\'video/mp4\'>

                        <p class="vjs-no-js alert-warning">
                            کاربر گرامی : برای مشاهده این ویدئو جاوااسکریپت مرورگر خود را فعال نمایید و یا مرورگرخود را
                            بروزرسانی کنید
                        </p>
                    </video>
                    <div class="download-link" style="text-align: center"><a href="' . $atts['src'] . '"  class="btn btn-success" target="_blank"><i class="fa fa-download"></i><span class="m-2">دانلود ویدئو</span></a></div>
';
}

function blockquote_shortcodes($atts, $content = null)
{
    return '
        <blockquote>
        <span class="icon"><i class="fas fa-quote-right"></i></span>
        <p class="text">' . $atts['text'] . '</p>
        <h5 class="name">- ' . $atts['quote'] . '</h5>
        </blockquote>
    ';
}

add_shortcode('free-video', 'free_video_shortcodes');
add_shortcode('bq', 'blockquote_shortcodes');
