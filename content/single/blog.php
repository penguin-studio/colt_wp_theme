<?php
/**
 * User: Максим Руденко
 * Date: 02.03.2016
 */

global $post;

$post_thumbnail_url = get_the_post_thumbnail_url($post->ID, 'master-full-screen');//Размер 1150х440

$post_content   = get_the_content();
$post_title     = get_the_title($post->ID);

$next_post_link_text = 'Наступна стаття';
$prev_post_link_text = 'Попередня стаття';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks col-md-12">
                <h2 class="main-blocks__title">Як ми відкривались</h2>
                <?php if($post_thumbnail_url != ''): ?>
                <div class="row">
                    <div class="col-md-12 blog-post-container">
                        <img src="<?php echo esc_url($post_thumbnail_url); ?>" alt="blog-post">
                    </div>
                </div>
                <?php endif; ?>
                <div class="post-container">
                    <?php echo $post_content; ?>
                    <nav>
                        <ul class="post-container__nav">
                            <li><?php previous_post_link('%link', esc_html($prev_post_link_text)); ?></li>
                            <li><?php next_post_link('%link', esc_html($next_post_link_text)); ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
