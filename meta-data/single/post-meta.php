<div class="article_top_info">
    <ul class="article_middle_info">
        <li><a href="#"><span class="icons"><i class="ti-user"></i></span><?php echo get_the_author() ?></a></li>
        <li><a href="#"><span class="icons"><i class="ti-comment-alt"></i></span><?php echo get_comments_number() ?> نظر ثبت شده</a></li>
        <li><a href="#"><span class="icons"><i class="ti-eye"></i></span><?php echo PostView::dwt_get_post_view(get_the_ID()) ?> بازدید </a></li>
        <li><a href="#"><span class="icons"><i class="ti-timer"></i></span><?php echo ReadEstimateTime::dwt_read_estimate_time(get_the_content()) ?> دقیقه</a></li>
        <li><a href="#"><span class="icons"><i class="ti-search"></i></span><?php echo GoogleReferer::dwt_get_google_referer(get_the_ID()) ?> ورودی گوگل</a></li>
    </ul>
</div>