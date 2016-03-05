<?php
/**
* Функция добавления дополнительных полей ЗМІ про нас
*/
function mass_media_additional_fields($post){
wp_nonce_field( basename( __FILE__ ), 'mass_media_nonce_field' );
$mass_media_date  = get_post_meta($post->ID,'_mass_media_date', true);
$mass_media_site  = get_post_meta($post->ID,'_mass_media_site', true);
$mass_media_img  = get_post_meta($post->ID,'_mass_media_img', true);
$mass_media_date  = isset($mass_media_date)?get_post_meta($post->ID,'_mass_media_date', true):'';
$mass_media_site  = isset($mass_media_site)?get_post_meta($post->ID,'_mass_media_site', true):'';
$mass_media_img  = isset($mass_media_img)?get_post_meta($post->ID,'_mass_media_img', true):'';

?>
<table class="add-box">
    <tr valign="top">
        <td colspan="3" style="min-width:800px;">
            <span>Сайт ЗМІ:</span>
            <input type="text" style="width: 300px;" name="mass_media_site" placeholder="Сайт ЗМІ" value="<?php echo esc_attr($mass_media_site); ?>">
            <span>Дата публикации:</span>
            <input type="text" style="width: 300px;" name="mass_media_date" placeholder="дд.мм.гг" value="<?php echo esc_attr($mass_media_date); ?>">
        </td>
    </tr>
    <tr>
        <td>
            <h3>Картинка фона для вывода списка публикация (570x440):</h3>
            <?php
            echo tf_img_upload('mass_media_img', $mass_media_img, '150px');
            ?>
        </td>
    </tr>
</table>

<?php
}

/**
 * Функция сохранения дополнительных полей ЗМІ про нас
 */
function mass_media_additional_fields_save ( $post_id ) {
    // проверяем, пришёл ли запрос со страницы с метабоксом
    if ( !isset( $_POST['mass_media_nonce_field'] )
        || !wp_verify_nonce( $_POST['mass_media_nonce_field'], basename( __FILE__ ) ) )
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
    if ($post->post_type == 'post')
    { // укажите собственный
        update_post_meta($post->ID,'_mass_media_date', sanitize_text_field($_POST['mass_media_date']));
        update_post_meta($post->ID,'_mass_media_site', sanitize_text_field($_POST['mass_media_site']));
        update_post_meta($post->ID,'_mass_media_img', sanitize_text_field($_POST['mass_media_img']));
    }
    return $post_id;
}
add_action('save_post', 'mass_media_additional_fields_save');

/**
 * Функция добавляет дополнительные поля на страницу постов
 */
function load_mass_media_additional_fields() {
    add_meta_box('mass_media_box_id', 'Настройка для ЗМІ про нас', 'mass_media_additional_fields', 'post', 'normal', 'low');
}
add_action( 'admin_menu', 'load_mass_media_additional_fields' );

//Размер картинки для страницы отображения записей масс медиа
add_image_size( 'mass-media-thumbnail', 570, 440, true );