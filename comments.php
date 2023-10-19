<div class="article_detail_wrapss single_article_wrap format-standard">

    <div class="comment-area">
        <div class="all-comments">
            <?php if (get_comments_number() == 0) : ?>
                <h3 class="comments-title">اولین نفری باشید که برای این مطلب بیان می کنید.</h3>
            <?php else : ?>
                <h3 class="comments-title"><?php echo get_comments_number() ?> دیدگاه</h3>
            <?php endif; ?>
            <div class="comment-list">
                <ul>
                    <?php
                    $args = [
                        'callback' => 'dwt_theme_comment',
                        'style' => 'ul',
                        'avatar_size' => 70,
                        'max_depth' => 2,
                    ];
                    wp_list_comments($args)
                    ?>
                </ul>
                <div class="my-4 commetn-pagination">
                    <?php
                    paginate_comments_links(array(
                        'prev_text'  => 'قبلی',
                        'next_text' => 'بعدی'
                    ));
                    ?>
                </div>
            </div>
        </div>
        <?php if (comments_open()) : ?>
            <!-- Modal -->
            <div class="modal fade" id="comment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title py-3 reply-to" id="exampleModalCenterTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success py-3 main-comment-content"></div>
                            <form action="<?php echo site_url() . '/wp-comments-post.php'; ?>" method="post">
                                <div class="row">
                                    <?php if (!is_user_logged_in()) : ?>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="author" class="form-control" placeholder="نام کامل">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="ایمیل معتبر">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="url" class="form-control" placeholder="وبسایت">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label for="wp-comment-cookies-consent">ذخیره نام، ایمیل و وبسایت من در مرورگر برای زمانی که دوباره دیدگاهی می‌نویسم.</label></p>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control" cols="30" rows="6" placeholder="نظر خود را بنویسید..."></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <!-- <a href="#" class="btn search-btn">ثبت</a> -->
                                    <input type="submit" name="submit" class="btn search-btn" value="ارسال دیدگاه">
                                    <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" id="comment_post_ID">
                                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    <?php
                                    if (is_user_logged_in()) { ?>
                                        <input type="hidden" id="_wp_unfiltered_comment_disabled" name="_wp_unfiltered_html_comment" value="<?php echo wp_create_nonce('') ?>">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                <div class="alert alert-info">برای ارسال دیدگاه ابتدا وارد سایت شوید.</div>
            <?php else : ?>
                <div class="comment-box submit-form">
                    <h3 class="reply-title">ثبت دیدگاه</h3>
                    <!-- <h6 class="py-3 reply-to"></h6> -->
                    <div class="alert alert-success py-3 main-comment-content"></div>
                    <div class="comment-form">
                        <?php
                        $user = get_userdata(get_current_user_id());
                        ?>
                        <p><?php echo $user->display_name ?> عزیز شما مجاز به ارسال دیدگاه خود هستید.</p>
                        <form action="<?php echo site_url() . '/wp-comments-post.php'; ?>" method="post">
                            <div class="row">
                                <?php if (!is_user_logged_in()) : ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="author" class="form-control" placeholder="نام کامل">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="ایمیل معتبر">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="url" class="form-control" placeholder="وبسایت">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label for="wp-comment-cookies-consent">ذخیره نام، ایمیل و وبسایت من در مرورگر برای زمانی که دوباره دیدگاهی می‌نویسم.</label></p>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control" cols="30" rows="6" placeholder="نظر خود را بنویسید..."></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <!-- <a href="#" class="btn search-btn">ثبت</a> -->
                                        <input type="submit" name="submit" class="btn search-btn" value="ارسال دیدگاه">
                                        <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" id="comment_post_ID">
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                        <?php
                                        if (is_user_logged_in()) { ?>
                                            <input type="hidden" id="_wp_unfiltered_comment_disabled" name="_wp_unfiltered_html_comment" value="<?php echo wp_create_nonce('') ?>">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="alert alert-info">ارسال دیدگاه برای این مطلب بسته شده است.</div>
        <?php endif; ?>
    </div>

</div>