<?php
/**
 * User: Максим Руденко
 * Date: 28.02.2016
 */

$theme_path_uri = get_template_directory_uri();
$options = get_option( 'theme_settings' );

?>
<div id="about_us" class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks about-us col-md-12">
                <h2 class="main-blocks__title"><?php echo esc_attr(tf_variable_exist($options['block_mp_title'])); ?></h2>
                <div class="col-md-6 main-blocks-left">
                    <?php
                        $style = '';
                        if(tf_variable_exist($options['block_mp_1_image']) != ''){
                            $bg_url = wp_get_attachment_image_url( $options['block_mp_1_image'], 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                    ?>
                    <div class="link-box autobiography" <?php echo $style;  ?>>
                        <h3 class="link-box__title autobiography__title">
                            <?php echo esc_html(tf_variable_exist($options['block_mp_1_title'])); ?>
                        </h3>
                        <div class="overlay">
                            <a href="<?php echo esc_url(tf_variable_exist($options['block_mp_1_url'])); ?>">
                                <img class="overlay-img" src="<?php echo $theme_path_uri; ?>/img/main-links/logo-link.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 main-blocks-right">
                    <div class="col-md-6">
                        <?php
                        $style = '';
                        if(tf_variable_exist($options['block_mp_2_image']) != ''){
                            $bg_url = wp_get_attachment_image_url( $options['block_mp_2_image'], 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box history main-blocks__content"  <?php echo $style;  ?>>
                            <h3 class="link-box__title history__title">
                                <?php echo esc_html(tf_variable_exist($options['block_mp_2_title'])); ?>
                            </h3>
                            <div class="overlay">
                                <a href="<?php echo esc_url(tf_variable_exist($options['block_mp_2_url'])); ?>">
                                    <img class="overlay-img" src="<?php echo $theme_path_uri; ?>/img/main-links/logo-link.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $style = '';
                        if(tf_variable_exist($options['block_mp_3_image']) != ''){
                            $bg_url = wp_get_attachment_image_url( $options['block_mp_3_image'], 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box ideas main-blocks__content"  <?php echo $style;  ?>>
                            <h3 class="link-box__title ideas__title">
                                <?php echo esc_html(tf_variable_exist($options['block_mp_3_title'])); ?>
                            </h3>
                            <div class="overlay">
                                <a href="<?php echo esc_url(tf_variable_exist($options['block_mp_3_url'])); ?>">
                                    <img class="overlay-img" src="<?php echo $theme_path_uri; ?>/img/main-links/logo-link.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 main-blocks-right__row">
                        <?php
                        $style = '';
                        if(tf_variable_exist($options['block_mp_4_image']) != ''){
                            $bg_url = wp_get_attachment_image_url( $options['block_mp_4_image'], 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box motivation main-blocks__content"  <?php echo $style;  ?>>
                            <h3 class="link-box__title motivation__title">
                                <?php echo esc_html(tf_variable_exist($options['block_mp_4_title'])); ?>
                            </h3>
                            <div class="overlay">
                                <a href="<?php echo esc_url(tf_variable_exist($options['block_mp_4_url'])); ?>">
                                    <img class="overlay-img" src="<?php echo $theme_path_uri; ?>/img/main-links/logo-link.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 main-blocks-right__row">
                        <?php
                        $style = '';
                        if(tf_variable_exist($options['block_mp_5_image']) != ''){
                            $bg_url = wp_get_attachment_image_url( $options['block_mp_5_image'], 'full' );
                            $style = 'style="background-image:url(\''.$bg_url.'\');"';
                        }
                        ?>
                        <div class="link-box people main-blocks__content"  <?php echo $style;  ?>>
                            <h3 class="link-box__title people__title">
                                <?php echo esc_html(tf_variable_exist($options['block_mp_5_title'])); ?>
                            </h3>
                            <div class="overlay">
                                <a href="<?php echo esc_url(tf_variable_exist($options['block_mp_5_url'])); ?>">
                                    <img class="overlay-img" src="<?php echo $theme_path_uri; ?>/img/main-links/logo-link.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>