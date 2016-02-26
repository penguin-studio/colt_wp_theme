<?php $options = get_option( 'theme_settings' ); ?>
        <div class="container">
            <footer class="footer main-blocks">
                <div class="row">
                    <div class="col-md-4">
                        <p class="footer-address">Вул. Михайловська, буд. 13</p>
                        <p class="footer-schedule">Графік роботи: 10:00 — 21:00 без вихідних</p>
                    </div>
                    <div class="col-md-4">
                        <ul class="contact-us">
                           <?php if(tf_variable_exist($options['contacts_phone'])):?>
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
                                <?php if(tf_variable_exist($options['social_vk_visible']) && $options['social_vk_visible'] == '1' &&
                                    $options['social_vk_url'] != ''):?>
                                    <li><a class="fa fa-vk" href="<?php echo esc_url($options['social_vk_url']);?>"></a></li>
                                <?php endif; ?>
                                <?php if(tf_variable_exist($options['social_facebook_visible']) && $options['social_facebook_visible'] == '1' &&
                                    $options['social_facebook_url'] != ''):?>
                                    <li><a class="fa fa-facebook" href="<?php echo esc_url($options['social_facebook_url']);?>"></a></li>
                                <?php endif; ?>
                                <?php if(tf_variable_exist($options['social_instagram_visible']) && $options['social_instagram_visible'] == '1' &&
                                    $options['social_instagram_url'] != ''):?>
                                    <li><a class="fa fa-instagram" href="<?php echo esc_url($options['social_instagram_url']);?>"></a></li>
                                <?php endif; ?>
                                <?php if(tf_variable_exist($options['social_twitter_visible']) && $options['social_twitter_visible'] == '1' &&
                                    $options['social_twitter_url'] != ''):?>
                                    <li><a class="fa fa-twitter" href="<?php echo esc_url($options['social_twitter_url']);?>"></a></li>
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
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/jquery.min.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/lightslider.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/common.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/bootstrap.min.js"></script>
    <!-- script end -->
    </body>
</html>
