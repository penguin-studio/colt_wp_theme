<?php $options = get_option( 'theme_settings' ); ?>
        <?php if(is_front_page()):?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="main-blocks about-us col-md-12">
                            <h2 class="main-blocks__title">Контакти</h2>
                            <?php
                                $lat  = "50.448071";
                                $lang = "30.522062";
                                $zoom = "12";
                                if(tf_variable_exist($options['maps_lat']) && $options['maps_lat'] != ''){
                                    $lat = $options['maps_lat'];
                                }
                                if(tf_variable_exist($options['maps_lng']) && $options['maps_lng'] != ''){
                                    $lang = $options['maps_lng'];
                                }
                                if(tf_variable_exist($options['maps_zoom']) && $options['maps_zoom'] != ''){
                                    $zoom = $options['maps_zoom'];
                                }

                                $theme_path_uri = get_template_directory_uri();
                                $marker_url = $theme_path_uri.'/img/marker.png';
                                if(tf_variable_exist($options['maps_marker'])){
                                    $marker_url = wp_get_attachment_image_url($options['maps_marker'], 'full');
                                }

                            ?>
                            <div class="map-wrapp" id="map" lat="<?php echo esc_attr($lat); ?>" lang="<?php echo esc_attr($lang); ?>" zoom="<?php echo esc_attr($zoom); ?>" marker="<?php echo esc_attr($marker_url); ?>" style="width: 100%; height: 300px;"></div>
                            <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="container">
            <footer class="footer main-blocks">
                <div class="row">
                    <div class="col-md-4">
                        <?php if(tf_variable_exist($options['contacts_adres'])):?>
                        <p class="footer-address"><?php echo esc_html($options['contacts_adres']); ?></p>
                        <?php endif; ?>
                        <?php if(tf_variable_exist($options['contacts_schedule'])):?>
                        <p class="footer-schedule"><?php echo esc_html($options['contacts_schedule']); ?></p>
                        <?php endif; ?>
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
    <?php if(is_front_page()):?>
        <script src="<?php echo esc_url($theme_path_uri); ?>/js/maps.js"></script>
    <?php endif; ?>
    <!-- script end -->
    </body>
</html>
