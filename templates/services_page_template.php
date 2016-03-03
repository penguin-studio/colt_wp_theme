<?php
/*
Template Name: Шаблон страницы Услуги
*/
/**
 * User: Максим Руденко
 * Date: 03.03.2016
 */
?>
<?php get_header();?>
<?php
    $theme_path_uri = get_template_directory_uri();
    $options        = get_option( 'theme_settings' );
    $overlay_img    = $theme_path_uri.'/img/main-links/logo-link.png';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks col-md-12">
                <h2 class="main-blocks__title">Послуги</h2>
                <div class="row-margin">
                    <div class="col-md-6 row-margin">
                        <?php
                        $block_services_1_title = isset($options['block_services_1_title'])?$options['block_services_1_title']:'';
                        $block_services_1_url   = isset($options['block_services_1_url'])?$options['block_services_1_url']:'';
                        $block_services_1_img   = isset($options['block_services_1_img'])?$options['block_services_1_img']:'';

                        $style = '';
                        if($block_services_1_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_1_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box haircut"  <?php echo $style; ?>>
                            <h3 class="link-box__title"><?php echo $block_services_1_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_1_url; ?>"><img class="overlay-img" src="<?php echo $overlay_img; ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 row-margin">
                        <?php
                        $block_services_2_title = isset($options['block_services_2_title'])?$options['block_services_2_title']:'';
                        $block_services_2_url   = isset($options['block_services_2_url'])?$options['block_services_2_url']:'';
                        $block_services_2_img   = isset($options['block_services_2_img'])?$options['block_services_2_img']:'';

                        $style = '';
                        if($block_services_2_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_2_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box greyness" <?php echo $style; ?>>
                            <h3 class="link-box__title"><?php echo $block_services_2_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_2_url; ?>"><img class="overlay-img" src="<?php echo $overlay_img; ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 row-margin">
                        <?php
                        $block_services_3_title = isset($options['block_services_3_title'])?$options['block_services_3_title']:'';
                        $block_services_3_url   = isset($options['block_services_3_url'])?$options['block_services_3_url']:'';
                        $block_services_3_img   = isset($options['block_services_3_img'])?$options['block_services_3_img']:'';

                        $style = '';
                        if($block_services_3_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_3_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box royal-shave" <?php echo $style; ?>>
                            <h3 class="link-box__title"><?php echo $block_services_3_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_3_url; ?>"><img class="overlay-img" src="<?php echo $overlay_img; ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <?php
                        $block_services_4_title = isset($options['block_services_4_title'])?$options['block_services_4_title']:'';
                        $block_services_4_url   = isset($options['block_services_4_url'])?$options['block_services_4_url']:'';
                        $block_services_4_img   = isset($options['block_services_4_img'])?$options['block_services_4_img']:'';

                        $style = '';
                        if($block_services_4_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_4_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box father-son" <?php echo $style; ?>>
                            <h3 class="link-box__title ideas__title"><?php echo $block_services_4_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_4_url; ?>"><img class="overlay-img" src="<?php echo $overlay_img; ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php
                        $block_services_5_title = isset($options['block_services_5_title'])?$options['block_services_5_title']:'';
                        $block_services_5_url   = isset($options['block_services_5_url'])?$options['block_services_5_url']:'';
                        $block_services_5_img   = isset($options['block_services_5_img'])?$options['block_services_5_img']:'';

                        $style = '';
                        if($block_services_5_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_5_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box child-haircut" <?php echo $style; ?>>
                            <h3 class="link-box__title motivation__title"><?php echo $block_services_5_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_5_url; ?>"><img class="overlay-img" src="<?php echo $overlay_img; ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php
                        $block_services_6_title = isset($options['block_services_6_title'])?$options['block_services_6_title']:'';
                        $block_services_6_url   = isset($options['block_services_6_url'])?$options['block_services_6_url']:'';
                        $block_services_6_img   = isset($options['block_services_6_img'])?$options['block_services_6_img']:'';

                        $style = '';
                        if($block_services_6_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_6_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box man-haircut" <?php echo $style; ?>>
                            <h3 class="link-box__title history__title"><?php echo $block_services_6_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_6_url; ?>"><img class="overlay-img" src="<?php echo $overlay_img; ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-margin">
                    <div class="col-md-3">
                        <?php
                        $block_services_7_title = isset($options['block_services_7_title'])?$options['block_services_7_title']:'';
                        $block_services_7_url   = isset($options['block_services_7_url'])?$options['block_services_7_url']:'';
                        $block_services_7_img   = isset($options['block_services_7_img'])?$options['block_services_7_img']:'';

                        $style = '';
                        if($block_services_7_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_7_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box laying" <?php echo $style; ?>>
                            <h3 class="link-box__title"><?php echo $block_services_7_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_7_url; ?>"><img class="overlay-img" src="img/main-links/logo-link.png"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $block_services_8_title = isset($options['block_services_8_title'])?$options['block_services_8_title']:'';
                        $block_services_8_url   = isset($options['block_services_8_url'])?$options['block_services_8_url']:'';
                        $block_services_8_img   = isset($options['block_services_8_img'])?$options['block_services_8_img']:'';

                        $style = '';
                        if($block_services_8_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_8_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box make-tattoo" <?php echo $style; ?>>
                            <h3 class="link-box__title motivation__title"><?php echo $block_services_8_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_8_url; ?>"><img class="overlay-img" src="img/main-links/logo-link.png"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 row-margin">
                        <?php
                        $block_services_9_title = isset($options['block_services_9_title'])?$options['block_services_9_title']:'';
                        $block_services_9_url   = isset($options['block_services_9_url'])?$options['block_services_9_url']:'';
                        $block_services_9_img   = isset($options['block_services_9_img'])?$options['block_services_9_img']:'';

                        $style = '';
                        if($block_services_9_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_9_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box mowing-machine" <?php echo $style; ?>>
                            <h3 class="link-box__title motivation__title"><?php echo $block_services_9_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_9_url; ?>"><img class="overlay-img" src="img/main-links/logo-link.png"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php
                        $block_services_10_title = isset($options['block_services_10_title'])?$options['block_services_10_title']:'';
                        $block_services_10_url   = isset($options['block_services_10_url'])?$options['block_services_10_url']:'';
                        $block_services_10_img   = isset($options['block_services_10_img'])?$options['block_services_10_img']:'';

                        $style = '';
                        if($block_services_10_img != ''){
                            $bg_url = wp_get_attachment_image_url($block_services_10_img, 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box beard-grooming" <?php echo $style; ?>>
                            <h3 class="link-box__title motivation__title"><?php echo $block_services_10_title; ?></h3>
                            <div class="overlay">
                                <a href="<?php echo $block_services_10_url; ?>"><img class="overlay-img" src="img/main-links/logo-link.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>

