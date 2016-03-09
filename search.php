<?php get_header();?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">


                    <?php if ( have_posts() ) : ?>
                        <?php
                        while ( have_posts() ) : the_post();
                            global $post;

                            if($post->post_type == 'slider' ){
                                continue;
                            }
                            ?>
                            <div class="main-blocks col-md-12">
                                <div class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
                                <div class="post-container">
                                    <?php
                                    $args = array(
                                            'maxchar'     => 100,
                                            'text'        => '',
                                            'save_format' => false,
                                            'more_text'   => '...',
                                            'echo'        => true
                                    );
                                        kama_excerpt($args);
                                    ?>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>

            </div>
        </div>
    </div>
    <div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>