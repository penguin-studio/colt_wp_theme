<?php
/*
Template Name: Шаблон страницы Школа барберів і тату
*/
/**
 * User: Максим Руденко
 * Date: 04.03.2016
 */
?>
<?php get_header();?>
<?php
$school_top_block_id = isset($options['school_top_block_id'])?$options['school_top_block_id']:'';
$school_bottom_block_id = isset($options['school_bottom_block_id'])?$options['school_bottom_block_id']:'';
?>
<?php if($school_top_block_id != ''):?>
<?php
    global $post;
    global $wp_query;
    $temp = $wp_query;
    $wp_query = null;

    $args = array(
        'post_type' => 'page',
        'page_id' => $school_top_block_id,
        'ignore_sticky_posts'=>true
    );
    $wp_query = new WP_Query($args);
    if($wp_query->post_count > 0):

?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="main-blocks col-md-12">

                    <?php if ( have_posts() ) : ?>
                        <?php
                        while ( have_posts() ) : the_post();
                            ?>
                            <h2 class="main-blocks__title"><?php the_title();?></h2>
                            <div class="post-container">
                                <?php
                                /* translators: %s: Name of current post */
                                the_content();
                                ?>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden-sm hidden-xs separator-line"></div>
<?php
    endif;
    $wp_query = null;
    $wp_query = $temp;
    wp_reset_postdata();
    ?>
<?php endif; ?>
<?php if($school_bottom_block_id != ''):?>
    <?php
    global $post;
    global $wp_query;
    $temp = $wp_query;
    $wp_query = null;

    $args = array(
        'post_type' => 'page',
        'page_id' => $school_bottom_block_id ,
        'ignore_sticky_posts'=>true
    );
    $wp_query = new WP_Query($args);
    if($wp_query->post_count > 0):

        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="main-blocks col-md-12">

                        <?php if ( have_posts() ) : ?>
                            <?php
                            while ( have_posts() ) : the_post();
                                ?>
                                <h2 class="main-blocks__title"><?php the_title();?></h2>
                                <div class="post-container">
                                    <?php
                                    /* translators: %s: Name of current post */
                                    the_content();
                                    ?>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-sm hidden-xs separator-line"></div>
        <?php
    endif;
    $wp_query = null;
    $wp_query = $temp;
    wp_reset_postdata();
    ?>
<?php endif; ?>
<?php get_footer(); ?>