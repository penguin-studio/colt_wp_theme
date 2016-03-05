<?php
/**
 * Файл отвечает за отображение шаблона страницы Опции темы
 * User: Руденко Максим
 * Date: 25.02.2016
 */

function theme_settings_page() {
    global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;
    ?>
    <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
        <div id="message" class="updated">
            <p><strong>Настройки сохранены</strong></p>
        </div>
    <?php endif; ?>
    <div class="theme-option-main-block">
        <br>
        <div>

            <form method="post" action="options.php">
                <p><input name="submit" id="submit" class="button button-primary my-button-primary" value="Сохранить" type="submit"></p>
                <?php settings_fields( 'theme_settings' ); ?>
                <?php $options = get_option( 'theme_settings' ); ?>

                <div id="container">
                    <div class="tabs">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1" title="">Общие настройки</label>

                        <input id="tab2" type="radio" name="tabs">
                        <label for="tab2" title="">Контакты</label>

                        <input id="tab3" type="radio" name="tabs">
                        <label for="tab3" title="">Настройки страниц</label>

                        <input id="tab4" type="radio" name="tabs">
                        <label for="tab4" title="">***</label>

                        <section id="content1">
                            <table class="theme-option-table">
                                <tr valign="top"><td colspan='2'><h1>Настройка шапки сайта</h1></td></tr>
                            </table>
                            <table class="theme-option-table table-block" >
                                <tr valign="top">
                                    <td>
                                        <h3>Логотип:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[logo]', tf_variable_exist($options['logo']));
                                        ?>
                                    </td>
                                    <td>
                                        <h3>Фавикон:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[favicon]', tf_variable_exist($options['favicon']), 16, 16);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <table class="theme-option-table">
                                <tr valign="top"><td colspan='2'><h1>Настройка подвала сайта</h1></td></tr>
                            </table>
                            <table class="theme-option-table table-block" >



                            </table>
                            <table class="theme-option-table">
                                <tr valign="top"><td colspan='2'><h1>Настройка верхнего меню</h1></td></tr>
                            </table>
                            <?php
                                $args = array( 'hide_empty' => false, 'orderby' => 'name' );
                                $menus = wp_get_nav_menus( $args );
                            ?>
                            <table class="theme-option-table table-block" >
                                <td>Левая половина меню

                                    <select name="theme_settings[menu_left_side]">
                                        <option value="-1" >Не выбрано</option>
                                    <?php if($menus):?>
                                        <?php foreach($menus as $item): ?>
                                            <option value="<?php echo esc_attr($item->term_id);?>" <?php selected($item->term_id,$options['menu_left_side'] ); ?>>
                                                <?php echo esc_html($item->name);?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </select>
                                </td>
                            </table>
                            <table class="theme-option-table table-block" >
                                <td>Правая половина меню

                                    <select name="theme_settings[menu_right_side]">
                                    <option value="-1" >Не выбрано</option>
                                    <?php if(isset($menus)):?>
                                        <?php foreach($menus as $item): ?>
                                            <option value="<?php echo esc_attr($item->term_id);?>" <?php selected($item->term_id,$options['menu_right_side'] ); ?>>
                                                <?php echo esc_html($item->name);?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </select>
                                </td>
                            </table>

                        </section>
                        <section id="content2">
                            <table class="theme-option-table table-block" >
                                <tr>
                                    <td>Адрес</td>
                                    <td><input type="text" name="theme_settings[contacts_adres]" placeholder="Введите адрес" value="<?php echo esc_attr(tf_variable_exist($options['contacts_adres'])); ?>" style="width: 400px;" ></td>
                                </tr>
                            </table>
                            <table class="theme-option-table table-block" >
                                <tr>
                                    <td>Карта Google maps</td>
                                    <td>Широта: <input type="text" name="theme_settings[maps_lat]" placeholder="Введите широту" value="<?php echo esc_attr(tf_variable_exist($options['maps_lat'])); ?>" style="width: 250px;" ></td>
                                    <td>Долгота: <input type="text" name="theme_settings[maps_lng]" placeholder="Введите долготу" value="<?php echo esc_attr(tf_variable_exist($options['maps_lng'])); ?>" style="width: 250px;" ></td>
                                    <td>Зум: <input type="text" name="theme_settings[maps_zoom]" placeholder="Зум" value="<?php echo esc_attr(tf_variable_exist($options['maps_zoom'])); ?>" style="width: 80px;" ></td>
                                    <td>Маркер <?php echo tf_img_upload('theme_settings[maps_marker]', tf_variable_exist($options['maps_marker']), 40); ?> </td>
                                </tr>
                            </table>
                            <table class="theme-option-table table-block" >
                            <tr>
                                <td>График роботи</td>
                                <td><input type="text" name="theme_settings[contacts_schedule]" placeholder="График роботи" value="<?php echo esc_attr(tf_variable_exist($options['contacts_schedule'])); ?>" style="width: 600px;" ></td>
                            </tr>
                            </table>
                            <table class="theme-option-table table-block" >
                                <tr>
                                    <td>Електронный адрес</td>
                                    <td><input type="text" name="theme_settings[contacts_email]" value="<?php echo esc_attr(tf_variable_exist($options['contacts_email'])); ?>" style="width: 400px;" ></td>
                                </tr>
                            </table>
                            <table id="add-field-area" class="theme-option-table table-block" >
                                <thead>
                                <th colspan="2"><input type="text" id="phone_number" style="width: 300px;" placeholder="Номер телефона">
                                <input type="button" id="add_phone_button" value="Добавить телефон"></th>
                                </thead>
                                <?php
                                 if(tf_variable_exist($options['contacts_phone'])):
                                    foreach($options['contacts_phone'] as $key=>$phone):
                                ?>
                                        <tr id="ph<?php echo esc_html($key); ?>" class="phone">
                                        <td colspan="2"><input type="text" name="theme_settings[contacts_phone][]" value="<?php echo esc_html($phone); ?>" style="width: 300px;" placeholder="Номер телефона">
                                           <input type="button" id="delete-number" phone-id="<?php echo esc_html($key); ?>" value="Удалить телефон"></td>
                                        </tr>
                                <?php
                                    endforeach;
                                 endif;
                                ?>

                            </table>
                            <table class="theme-option-table">
                                <tr valign="top"><td colspan='2'><h1>Социальные сети</h1></td></tr>
                            </table>
                            <table class="theme-option-table table-block social" >
                                <thead>
                                <th>Название</th>
                                <th>Состояние </th>
                                <th>Ссылка</th>
                                </thead>
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
                                <tr>
                                    <td>Вконтакте</td>
                                    <td><input type="checkbox" name="theme_settings[social_vk_visible]" value="1" <?php checked($social_vk_visible,'1'); ?>></td>
                                    <td><input type="text" name="theme_settings[social_vk_url]" value="<?php echo esc_attr($social_vk_url); ?>" style="width: 400px;" ></td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td><input type="checkbox" name="theme_settings[social_facebook_visible]" value="1" <?php checked($social_facebook_visible,'1'); ?>></td>
                                    <td><input type="text" name="theme_settings[social_facebook_url]" value="<?php echo esc_attr($social_facebook_url); ?>" style="width: 400px;" ></td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td><input type="checkbox" name="theme_settings[social_instagram_visible]" value="1" <?php checked($social_instagram_visible,'1'); ?>></td>
                                    <td><input type="text" name="theme_settings[social_instagram_url]" value="<?php echo esc_attr($social_instagram_url); ?>" style="width: 400px;" ></td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td><input type="checkbox" name="theme_settings[social_twitter_visible]" value="1" <?php checked($social_twitter_visible,'1'); ?>></td>
                                    <td><input type="text" name="theme_settings[social_twitter_url]" value="<?php echo esc_attr($social_twitter_url); ?>" style="width: 400px;" ></td>
                                </tr>
                            </table>
                        </section>
                        <section id="content3">
                            <table class="theme-option-table">
                                <tr valign="top"><td colspan='2'><h1>Настройка блока главной страницы</h1></td></tr>
                            </table>
                            <table class="theme-option-table table-block" >
                                <tr>
                                    <td colspan="2">
                                        <h3>Заголовок блока:</h3>
                                        <input type="text" name="theme_settings[block_mp_title]" placeholder="Заголовок блока" value="<?php echo esc_attr(tf_variable_exist($options['block_mp_title'])); ?>" style="width: 300px;" >
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; ">
                                        <div class="main-container">
                                            <div class="left-block block-active">
                                            </div>
                                            <div class="right-block">
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_mp_1_title]" placeholder="Подпись блока" value="<?php echo esc_attr(tf_variable_exist($options['block_mp_1_title'])); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_mp_1_url]',tf_variable_exist($options['block_mp_1_url'])); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_mp_1_image]', tf_variable_exist($options['block_mp_1_image']));
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; ">
                                        <div class="main-container">
                                            <div class="left-block">
                                            </div>
                                            <div class="right-block">
                                                <div class="own-block block-active"></div>
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_mp_2_title]" placeholder="Подпись блока" value="<?php echo esc_attr(tf_variable_exist($options['block_mp_2_title'])); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_mp_2_url]',tf_variable_exist($options['block_mp_2_url'])); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_mp_2_image]', tf_variable_exist($options['block_mp_2_image']));
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; ">
                                        <div class="main-container">
                                            <div class="left-block">
                                            </div>
                                            <div class="right-block">
                                                <div class="own-block"></div>
                                                <div class="own-block block-active"></div>
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_mp_3_title]" placeholder="Подпись блока" value="<?php echo esc_attr(tf_variable_exist($options['block_mp_3_title'])); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_mp_3_url]',tf_variable_exist($options['block_mp_3_url'])); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_mp_3_image]', tf_variable_exist($options['block_mp_3_image']));
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; ">
                                        <div class="main-container">
                                            <div class="left-block">
                                            </div>
                                            <div class="right-block">
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                                <div class="own-block block-active"></div>
                                                <div class="own-block"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_mp_4_title]" placeholder="Подпись блока" value="<?php echo esc_attr(tf_variable_exist($options['block_mp_4_title'])); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_mp_4_url]',tf_variable_exist($options['block_mp_4_url'])); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_mp_4_image]', tf_variable_exist($options['block_mp_4_image']));
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 200px; ">
                                        <div class="main-container">
                                            <div class="left-block">
                                            </div>
                                            <div class="right-block">
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                                <div class="own-block"></div>
                                                <div class="own-block block-active"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_mp_5_title]" placeholder="Подпись блока" value="<?php echo esc_attr(tf_variable_exist($options['block_mp_5_title'])); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_mp_5_url]',tf_variable_exist($options['block_mp_5_url'])); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_mp_5_image]', tf_variable_exist($options['block_mp_5_image']));
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <table class="theme-option-table">
                                <tr valign="top"><td colspan='2'><h1>Настройка страницы ЗМІ про нас</h1></td></tr>
                            </table>
                            <table class="theme-option-table table-block" >
                                <tr>
                                    <td>
                                        <h3>Выбор категории для отображения на странице ЗМІ про нас</h3>
                                        <select name="theme_settings[mass_media_about_us]" style="width:300px">
                                        <?php
                                        $args = array(
                                            'type'         => 'post',
                                            'child_of'     => 0,
                                            'parent'       => '',
                                            'orderby'      => 'name',
                                            'order'        => 'ASC',
                                            'hide_empty'   => 1,
                                            'hierarchical' => 1,
                                            'exclude'      => '',
                                            'include'      => '',
                                            'number'       => 0,
                                            'taxonomy'     => 'category',
                                            'pad_counts'   => false
                                        );

                                        $mass_media_about_us = isset($options['mass_media_about_us'])?$options['mass_media_about_us']:0;

                                        ?>
                                            <option value="0" <?php selected( $mass_media_about_us, '0' ) ?>>Не выбрано</option>
                                        <?php
                                            $categories = get_categories( $args );
                                            if( $categories ){
                                                foreach( $categories as $cat ){
                                                    ?>
                                                    <option value="<?php echo esc_attr($cat->slug); ?>" <?php selected( $mass_media_about_us, $cat->slug ) ?>><?php echo esc_html($cat->name) ?></option>
                                                <?php
                                               }
                                            }
                                        ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <!-- Настройка блока услуг -->
                            <table class="theme-option-table">
                                <tr valign="top"><td colspan='2'><h1>Настройка страницы услуги</h1></td></tr>
                            </table>
                            <table class="theme-option-table table-block" >
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom block-active"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                        $block_services_1_title = isset($options['block_services_1_title'])?$options['block_services_1_title']:'';
                                        $block_services_1_url   = isset($options['block_services_1_url'])?$options['block_services_1_url']:'';
                                        $block_services_1_img   = isset($options['block_services_1_img'])?$options['block_services_1_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_1_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_1_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_1_url]',$block_services_1_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_1_img]', $block_services_1_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom block-active"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_2_title = isset($options['block_services_2_title'])?$options['block_services_2_title']:'';
                                    $block_services_2_url   = isset($options['block_services_2_url'])?$options['block_services_2_url']:'';
                                    $block_services_2_img   = isset($options['block_services_2_img'])?$options['block_services_2_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_2_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_2_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_2_url]',$block_services_2_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_2_img]', $block_services_2_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right block-active"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_3_title = isset($options['block_services_3_title'])?$options['block_services_3_title']:'';
                                    $block_services_3_url   = isset($options['block_services_3_url'])?$options['block_services_3_url']:'';
                                    $block_services_3_img   = isset($options['block_services_3_img'])?$options['block_services_3_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_3_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_3_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_3_url]',$block_services_3_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_3_img]', $block_services_3_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block block-active"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_4_title = isset($options['block_services_4_title'])?$options['block_services_4_title']:'';
                                    $block_services_4_url   = isset($options['block_services_4_url'])?$options['block_services_4_url']:'';
                                    $block_services_4_img   = isset($options['block_services_4_img'])?$options['block_services_4_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_4_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_4_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_4_url]',$block_services_4_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_4_img]', $block_services_4_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block block-active"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_5_title = isset($options['block_services_5_title'])?$options['block_services_5_title']:'';
                                    $block_services_5_url   = isset($options['block_services_5_url'])?$options['block_services_5_url']:'';
                                    $block_services_5_img   = isset($options['block_services_5_img'])?$options['block_services_5_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_5_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_5_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_5_url]',$block_services_5_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_5_img]', $block_services_5_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right block-active"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_6_title = isset($options['block_services_6_title'])?$options['block_services_6_title']:'';
                                    $block_services_6_url   = isset($options['block_services_6_url'])?$options['block_services_6_url']:'';
                                    $block_services_6_img   = isset($options['block_services_6_img'])?$options['block_services_6_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_6_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_6_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_6_url]',$block_services_6_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_6_img]', $block_services_6_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2 block-active"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_7_title = isset($options['block_services_7_title'])?$options['block_services_7_title']:'';
                                    $block_services_7_url   = isset($options['block_services_7_url'])?$options['block_services_7_url']:'';
                                    $block_services_7_img   = isset($options['block_services_7_img'])?$options['block_services_7_img']:'';

                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_7_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_7_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_7_url]',$block_services_7_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_7_img]', $block_services_7_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2 block-active"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_8_title = isset($options['block_services_8_title'])?$options['block_services_8_title']:'';
                                    $block_services_8_url   = isset($options['block_services_8_url'])?$options['block_services_8_url']:'';
                                    $block_services_8_img   = isset($options['block_services_8_img'])?$options['block_services_8_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_8_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_8_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_8_url]',$block_services_8_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_8_img]', $block_services_8_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2 block-active"></div>
                                                <div class="services-mini-2-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_9_title = isset($options['block_services_9_title'])?$options['block_services_9_title']:'';
                                    $block_services_9_url   = isset($options['block_services_9_url'])?$options['block_services_9_url']:'';
                                    $block_services_9_img   = isset($options['block_services_9_img'])?$options['block_services_9_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_9_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_9_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_9_url]',$block_services_9_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_9_img]', $block_services_9_img);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="services-conteiner">
                                            <div class="services-right">
                                                <div class="services-full-block services-margin-bottom"></div>
                                                <div class="services-mini-block"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                            </div>
                                            <div class="services-right">
                                                <div class="services-mini-block services-margin-bottom"></div>
                                                <div class="services-mini-block non-margin-right"></div>
                                                <div class="services-full-block"></div>
                                            </div>
                                            <div class="services-full">
                                                <div class="services-mini-2"></div>
                                                <div class="services-full-block-2"></div>
                                                <div class="services-mini-2-2"></div>
                                                <div class="services-mini-2-2 block-active"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                    $block_services_10_title = isset($options['block_services_10_title'])?$options['block_services_10_title']:'';
                                    $block_services_10_url   = isset($options['block_services_10_url'])?$options['block_services_10_url']:'';
                                    $block_services_10_img   = isset($options['block_services_10_img'])?$options['block_services_10_img']:'';
                                    ?>
                                    <td colspan="2">
                                        <h3>Название блока:</h3>
                                        <input type="text" name="theme_settings[block_services_10_title]" placeholder="Подпись блока" value="<?php echo esc_attr($block_services_10_title); ?>" style="width: 300px;" >
                                    </td>
                                    <td>
                                        <h3>Страница блока:</h3>
                                        <?php echo tf_view_pages('theme_settings[block_services_10_url]',$block_services_10_url); ?>
                                    </td>
                                    <td>
                                        <h3>Картинка фона:</h3>
                                        <?php
                                        echo tf_img_upload('theme_settings[block_services_10_img]', $block_services_10_img);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <!-- Настройка блока услуг -->
                            <table class="theme-option-table">
                                <tr valign="top"><td colspan='2'><h1>Настройка страницы школа барберів і тату</h1></td></tr>
                            </table>
                            <table class="theme-option-table table-block" >
                                <tr valign="top">
                                    <?php
                                        $school_top_block_id = isset($options['school_top_block_id'])?$options['school_top_block_id']:'';
                                        $school_bottom_block_id = isset($options['school_bottom_block_id'])?$options['school_bottom_block_id']:'';
                                    ?>
                                    <td>
                                        <h3>Страница верхнего блока:</h3>
                                        <?php echo tf_view_pages_with_id('theme_settings[school_top_block_id]',$school_top_block_id); ?>
                                    </td>
                                    <td>
                                        <h3>Страница нижнего блока:</h3>
                                        <?php echo tf_view_pages_with_id('theme_settings[school_bottom_block_id]',$school_bottom_block_id); ?>
                                    </td>
                                </tr>
                            </table>

                        </section>
                        <section id="content4">

                        </section>
                    </div>
                </div>
                <p><input name="submit" id="submit" class="button button-primary my-button-primary" value="Сохранить" type="submit"></p>
            </form>
        </div>
    </div>

<?php }