<?php
function dwt_theme_comment($comment, $args)
{
    $comment = $GLOBALS['comment'];
    /*    echo '<pre>';
    var_dump($comment);
    echo '</pre>';*/
    global $post;
?>
    <!--<li id="comment-<?php /*comment_ID(); */ ?>" class="article_comments_wrap">-->
    <li id="comment-<?php echo $comment->comment_ID; ?>" <?php comment_class('article_comments_wrap') ?>>
        <article>
            <div class="article_comments_thumb">
                <?php echo get_avatar($comment->comment_author_email, $args['avatar_size'], '', $comment->comment_author/*,['class'=>'rounded']*/) ?>
            </div>
            <div class="comment-details">
                <div class="comment-meta">
                    <div class="comment-left-meta">
                        <h4 class="author-name"><?php echo $comment->comment_author ?>
                            <?php
                            $user_data = get_userdata($comment->user_id);
                            /*             echo '<pre>';
                        var_dump($user_data);
                        echo '</pre>';
                       exit;*/

                            if ($user_data->roles[0] == 'administrator') :
                                /*                                switch ($user_data->roles[0]){
                                    case administrator:
                                        echo '<span class="selected"><i class="fas fa-bookmark"></i></span>';
                                        break;
                                    case vip:
                                        echo '<span class="selected"><i class="fas fa-bookmark"></i></span>';

                                }*/
                            ?>
                                <span class="selected"><i class="fas fa-bookmark"></i></span>
                            <?php endif; ?>
                        </h4>
                        <div class="comment-date"><?php echo get_comment_date('j F, Y'); ?></div>
                        <div class="comment-reply">
                            <?php if (is_user_logged_in()) : ?>
                                <a href="#" class="reply" data-toggle="modal" data-target="#comment-modal" data-comment-id="<?php echo $comment->comment_ID; ?>" data-comment-author="<?php echo $comment->comment_author ?>" data-comment-content="<?php echo $comment->comment_content ?>"><span class="icona"><i class="ti-back-right"></i></span> پاسخ</a>
                                <!-- <a href="" class="btn btn-info btn-sm">ویرایش</a> -->
                            <?php endif; ?>
                            <?php if (current_user_can('manage_options')) {
                                edit_comment_link('<i class="fal fa fa-edit text-warning"></i>');
                            }
                            ?>
                        </div>
                    </div>
                    <div class="comment-text">
                        <?php if (!$comment->comment_approved) : ?>
                            <div class="alert alert-info">دیدگاه شما ارسال شد و پس از تایید مدیر در سایت نمایش داده خواهد شد!</div>
                        <?php else : ?>
                            <p><?php echo $comment->comment_content ?></p>
                        <?php endif; ?>
                    </div>
                </div>
        </article>

    </li>
<?php
}
