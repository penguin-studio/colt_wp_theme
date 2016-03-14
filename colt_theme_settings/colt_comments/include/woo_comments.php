<?php
/**
 * User: Эзиз
 * Date: 14.03.2016
 * Time: 22:22
 */
function woocommerce_view_form(){
    global $post;
    global $current_user;

    $id = $post->ID;

    ?>
    <form class="request catalogue-item__request" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
        <input type="text" name="author" placeholder="Ваше ім'я" value="<?php echo $current_user->user_login; ?>">
        <textarea placeholder="Комментар" name="comment"></textarea>
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
        <input type="submit" value="Залишити комментар">
    </form>
    <?php
}
function woocommerce_view_comments($post_g, $comment_id = ''){
    global $post;
    $post = $post_g;

    $post_ID = $post->ID;
    $comm_class = 'comment';


    if($comment_id == ''){
        $comments = get_comments(array('post_id' => $post_ID, 'hierarchical' => 'threaded'));
    }
    else{
        $comments = get_comments(array('post_id' => $post_ID, 'parent' => (int)$comment_id));
        $comm_class = 'answer';
    }

    if($comments){
        foreach ($comments as $comment) :

            $autor = $comment->comment_author;

            ?>

            <div class="form-review">
                <h3 class="form-review__title"><?php echo esc_html($autor); ?><span class="form-review__date"><?php echo get_comment_date('d.m.Y', $comment->comment_ID); ?></span></h3>
                <p class="form-review__text"><?php echo esc_html($comment->comment_content); ?></p>
            </div>

            <?php
            woocommerce_view_comments($post, $comment->comment_ID);
            ?>
            
        <?php
        endforeach;

    }
    else{
        return 1;
    }
}