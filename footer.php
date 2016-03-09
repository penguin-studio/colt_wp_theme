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
                            <li class="skype-call"><i class="fa fa-skype"></i><a href="skype:[barbershopmrcolt]">barbershopmrcolt</a></li>
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
                            <a class="footer-question" data-toggle="modal" data-target="#questionModal" href="#">Задать вопрос</a>
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
<!-- modal -->
                    <div class="modal fade" id="questionModal" tabindex="-1" role="dialog">
                    	<div class="modal-dialog">
                    		<div class="modal-content">
                    			<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    			</div>
                    			<div class="modal-body">
                    				<form class="request request-franchise" action="" method="post">
                    					<h3>Задати питання</h3>
                    					<div class="row">
                    						<div class="col-md-6">
                    							<input type="text" placeholder="Ім’я*" required="">
                    							<input type="text" placeholder="Телефон*" required="">
                    							<input type="text" placeholder="E-mail*" required="">
                    						</div>
                    						<div class="col-md-6">
                    							<textarea placeholder="Запитання"></textarea>
                    						</div>
                    					</div>
                    					<div class="wrapp-check-online">
                    						<input class="check-online btn-submit" type="submit" value="Надіслати">
                    					</div>
                    				</form>
                    			</div>
                    		</div>
                    	</div>
                    </div>
    <!-- script -->
    <script type="text/javascript" src="https://w15352.yclients.com/widgetJS" charset="UTF-8"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/jquery.min.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/lightslider.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/common.js"></script>
    <script src="<?php echo esc_url($theme_path_uri); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf-8">
    var host = 'https://yclients.com';
    document.write(unescape("%3Cscript src='" + host + "/js/ms.bookingwlink.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript" charset="utf-8">
    MSWidget.initWidget();
    </script>
    <?php if(is_front_page()):?>
        <script src="<?php echo esc_url($theme_path_uri); ?>/js/maps.js"></script>
    <?php endif; ?>
    <!-- script end -->
    </body>
</html>
