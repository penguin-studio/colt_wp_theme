<?php $options = get_option( 'theme_settings' ); ?>

        <div class="container">
            <footer class="footer main-blocks">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                            $contacts_adres = isset($options['contacts_adres'])?$options['contacts_adres']:'';
                            $contacts_schedule = isset($options['contacts_schedule'])?$options['contacts_schedule']:'';
                        ?>
                        <?php if($contacts_adres):?>
                        <p class="footer-address"><?php echo esc_html($contacts_adres); ?></p>
                        <?php endif; ?>
                        <?php if($contacts_schedule):?>
                        <p class="footer-schedule"><?php echo esc_html($contacts_schedule); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <ul class="contact-us">
                           <?php if(isset($options['contacts_phone'])):?>
                            <?php foreach($options['contacts_phone'] as $phone): ?>
                                <li><?php echo esc_html($phone); ?></li>
                            <?php endforeach; ?>
                           <?php endif; ?>
                            <?php if(tf_variable_exist($options['contacts_email']) && $options['contacts_email'] != ''):?>
                            <li><a href="mailto:<?php echo esc_attr($options['contacts_email']);?>"><?php echo esc_html($options['contacts_email']);?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <nav class="nav__social">
                            <ul class="nav__social-list">
                                <?php
                                $social_vk_visible = isset($options['social_vk_visible'])?$options['social_vk_visible']:'';
                                $social_vk_url = isset($options['social_vk_url'])?$options['social_vk_url']:'';
                                $social_facebook_visible = isset($options['social_facebook_visible'])?$options['social_facebook_visible']:'';
                                $social_facebook_url = isset($options['social_facebook_url'])?$options['social_facebook_url']:'';
                                $social_instagram_visible = isset($options['social_instagram_visible'])?$options['social_instagram_visible']:'';
                                $social_instagram_url = isset($options['social_instagram_url'])?$options['social_instagram_url']:'';
                                $social_twitter_visible = isset($options['social_twitter_visible'])?$options['social_twitter_visible']:'';
                                $social_twitter_url = isset($options['social_twitter_url'])?$options['social_twitter_url']:'';

                                ?>

                                <?php if($social_vk_visible && $social_vk_visible == '1' &&
                                    $social_vk_url != ''):?>
                                    <li><a class="fa fa-vk" href="<?php echo esc_url($social_vk_url);?>"></a></li>
                                <?php endif; ?>
                                <?php if($social_facebook_visible && $social_facebook_visible == '1' &&
                                    $social_facebook_url != ''):?>
                                    <li><a class="fa fa-facebook" href="<?php echo esc_url($social_facebook_url);?>"></a></li>
                                <?php endif; ?>
                                <?php if($social_instagram_visible && $social_instagram_visible == '1' &&
                                    $social_instagram_url != ''):?>
                                    <li><a class="fa fa-instagram" href="<?php echo esc_url($social_instagram_url);?>"></a></li>
                                <?php endif; ?>
                                <?php if( $social_twitter_visible && $social_twitter_visible == '1' &&
                                    $social_twitter_url != ''):?>
                                    <li><a class="fa fa-twitter" href="<?php echo esc_url($social_twitter_url);?>"></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <div class="faq">
                            <a href="#">FAQ</a>
                            <a class="footer-question" href="#">задать вопрос</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <?php  wp_footer();?>
    <?php
    $theme_path_uri = get_template_directory_uri()
    ?>
    <!-- script -->
    <script type="text/javascript" src="https://w15352.yclients.com/widgetJS" charset="UTF-8"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/jquery.min.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/lightslider.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/common.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/bootstrap.min.js"></script>
    <?php if(is_front_page()):?>
        <script src="<?php echo esc_url($theme_path_uri); ?>/js/maps.js"></script>
    <?php endif; ?>
    <!-- script end -->
    </body>
</html>
