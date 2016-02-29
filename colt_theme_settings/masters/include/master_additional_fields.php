<?php
/**
 * User: Максим Руденко
 * Date: 29.02.2016
 * Файл отвечает за добавление дополнительных полей мастеров
 */

/**
 * Функция добавления дополнительных полей мастеров
 */
function master_content($post){
    wp_nonce_field( basename( __FILE__ ), 'master_nonce_field' );
    $master_content = tf_variable_exist(get_post_meta($post->ID,'master_content', true));
    $master_quote   = tf_variable_exist(get_post_meta($post->ID,'master_quote', true));
    $master_galery   = tf_variable_exist(get_post_meta($post->ID,'master_galery', true));


    ?>
    <table class="add-box">
        <tr valign="top">
            <td colspan="3" style="min-width:800px;">
                <h3>Цитата:</h3>
                <?php
                wp_editor($master_quote, 'master_quote_id', array(
                    'wpautop' => 0,
                    'media_buttons' => 1,
                    'textarea_name' => 'master_quote',
                    'textarea_rows' => 3,
                    'tabindex'      => null,
                    'editor_css'    => '',
                    'editor_class'  => '',
                    'teeny'         => 0,
                    'dfw'           => 0,
                    'tinymce'       => 1,
                    'quicktags'     => 1,
                    'drag_drop_upload' => false
                ) );
                ?>
            </td>
        </tr>
        <tr valign="top">
            <td colspan="3" style="min-width:800px;" >
                <h3>Описание:</h3>
                <?php
                wp_editor($master_content, 'master_content_id', array(
                    'wpautop' => 0,
                    'media_buttons' => 1,
                    'textarea_name' => 'master_content',
                    'textarea_rows' => 20,
                    'tabindex'      => null,
                    'editor_css'    => '',
                    'editor_class'  => '',
                    'teeny'         => 0,
                    'dfw'           => 0,
                    'tinymce'       => 1,
                    'quicktags'     => 1,
                    'drag_drop_upload' => false
                ) );
                ?>
            </td>
        </tr>

    </table>
    <table class="galery-table">
        <tr valign="top">
            <td id="">
                <h3>Добавить новое фото в галерею</h3>
                <?php $default = colt_theme_settings_directory_uri . '/admin/images/no-logo.png';?>
                <input type="hidden" id="default_img" value="<?php echo esc_attr($default);?>">
                <div class="wp-media-buttons">
                <button id="add_new_galery_item" class="button insert-media add_media   ">
                    <span class="wp-media-buttons-icon"></span>Добавить фото в галерею
                </button>
                    </div>
            </td>
        </tr>
        <tr valign="top">
            <td id="master-galery-area" class="master-galery-area-style">
                <?php
                    $res = master_admin_view_galery($master_galery);
                    if($res){
                        echo $res;
                    }
                ?>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Функция сохранения дополнительных полей мастеров
 */
function master_content_save ( $post_id ) {
    // проверяем, пришёл ли запрос со страницы с метабоксом
    if ( !isset( $_POST['master_nonce_field'] )
        || !wp_verify_nonce( $_POST['master_nonce_field'], basename( __FILE__ ) ) )
        return $post_id;
    // проверяем, является ли запрос автосохранением
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;
    // проверяем, права пользователя, может ли он редактировать записи
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    // теперь также проверим тип записи
    $post = get_post($post_id);
    //необходимо добавлять новый объект!!!
    if ($post->post_type == 'barber-master' || $post->post_type == 'tattoo-master')
    { // укажите собственный
        update_post_meta($post->ID,'master_quote', $_POST['master_quote']);
        update_post_meta($post->ID,'master_content', $_POST['master_content']);
        update_post_meta($post->ID,'master_galery', $_POST['master_galery']);
    }
    return $post_id;
}
add_action('save_post', 'master_content_save');

/**
* Функция добавляет дополнительные поля на страницу создания мастера
*/
function load_master_content() {
    add_meta_box('master_box_id', 'Настройка параметров мастера', 'master_content', array('barber-master', 'tattoo-master'), 'normal', 'high');
}
add_action( 'admin_menu', 'load_master_content' );