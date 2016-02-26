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

        <div>

            <form method="post" action="options.php">
                <p><input name="submit" id="submit" class="button button-primary my-button-primary" value="Сохранить" type="submit"></p>
                <?php settings_fields( 'theme_settings' ); ?>
                <?php $options = get_option( 'theme_settings' ); ?>

                <div id="container">
                    <div class="tabs">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1" title="Шапка|Подвал">Общие настройки</label>

                        <input id="tab2" type="radio" name="tabs">
                        <label for="tab2" title="***">Контакты</label>

                        <input id="tab3" type="radio" name="tabs">
                        <label for="tab3" title="***">***</label>

                        <input id="tab4" type="radio" name="tabs">
                        <label for="tab4" title="***">***</label>

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
                                </tr>
                                <tr valign="top">
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
                                <td>График роботи</td>
                                <td><input type="text" name="theme_settings[contacts_shedule]" placeholder="График роботи" value="<?php echo esc_attr(tf_variable_exist($options['contacts_schedule'])); ?>" style="width: 600px;" ></td>
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
                                    foreach($options['contacts_phone'] as $key=>$phone):
                                ?>
                                        <tr id="ph<?php echo esc_html($key); ?>" class="phone">
                                        <td colspan="2"><input type="text" name="theme_settings[contacts_phone][]" value="<?php echo esc_html($phone); ?>" style="width: 300px;" placeholder="Номер телефона">
                                           <input type="button" id="delete-number" phone-id="<?php echo esc_html($key); ?>" value="Удалить телефон"></td>
                                        </tr>
                                <?php
                                    endforeach;
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
                                <tr>
                                    <td>Вконтакте</td>
                                    <td><input type="checkbox" name="theme_settings[social_vk_visible]" value="1" <?php checked(tf_variable_exist($options['social_vk_visible']),'1'); ?>></td>
                                    <td><input type="text" name="theme_settings[social_vk_url]" value="<?php echo esc_attr(tf_variable_exist($options['social_vk_url'])); ?>" style="width: 400px;" ></td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td><input type="checkbox" name="theme_settings[social_facebook_visible]" value="1" <?php checked(tf_variable_exist($options['social_facebook_visible']),'1'); ?>></td>
                                    <td><input type="text" name="theme_settings[social_facebook_url]" value="<?php echo esc_attr(tf_variable_exist($options['social_facebook_url'])); ?>" style="width: 400px;" ></td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td><input type="checkbox" name="theme_settings[social_instagram_visible]" value="1" <?php checked(tf_variable_exist($options['social_instagram_visible']),'1'); ?>></td>
                                    <td><input type="text" name="theme_settings[social_instagram_url]" value="<?php echo esc_attr(tf_variable_exist($options['social_instagram_url'])); ?>" style="width: 400px;" ></td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td><input type="checkbox" name="theme_settings[social_twitter_visible]" value="1" <?php checked(tf_variable_exist($options['social_twitter_visible']),'1'); ?>></td>
                                    <td><input type="text" name="theme_settings[social_twitter_url]" value="<?php echo esc_attr(tf_variable_exist($options['social_twitter_url'])); ?>" style="width: 400px;" ></td>
                                </tr>
                            </table>
                        </section>
                        <section id="content3">

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