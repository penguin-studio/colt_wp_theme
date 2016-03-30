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
                        <label for="tab2" title="***">***</label>

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
                                        echo tf_img_upload('theme_settings[logo_uri]', tf_variable_exist($options['logo_uri']));
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