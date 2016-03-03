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
                                    <td>
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