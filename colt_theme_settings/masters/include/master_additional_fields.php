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
    $master_first_name  = tf_variable_exist(get_post_meta($post->ID,'_master_first_name', true));
    $master_second_name = tf_variable_exist(get_post_meta($post->ID,'_master_second_name', true));
    $master_content     = tf_variable_exist(get_post_meta($post->ID,'_master_content', true));
    $master_quote       = tf_variable_exist(get_post_meta($post->ID,'_master_quote', true));

    $master_galery      = tf_variable_exist(get_post_meta($post->ID,'_master_galery', true));


    ?>
    <table class="add-box">
        <tr valign="top">
            <td colspan="3" style="min-width:800px;">
                <?php
                    $master_type = "";
                    if($post->post_type == 'barber-master'){
                        $master_type = 'барбер';
                    }
                    if($post->post_type == 'tattoo-master'){
                        $master_type = 'тату';
                    }
                ?>
                <h3>Имя и Фамилия <?php echo $master_type; ?> мастера:</h3>
                <span>Имя:</span>
                <input type="text" style="width: 300px;" name="master_first_name" placeholder="Имя <?php echo $master_type; ?> мастера" value="<?php echo esc_attr($master_first_name); ?>">
                <span>Фамилия:</span>
                <input type="text" style="width: 300px;" name="master_second_name" placeholder="Фамилия <?php echo $master_type; ?> мастера" value="<?php echo esc_attr($master_second_name); ?>">
            </td>
        </tr>
        <tr valign="top">
            <td colspan="3" style="min-width:800px;">
                <h3>Цитата:</h3>
                <?php
                wp_editor($master_quote, 'master_quote_id', array(
                    'wpautop' => 1,
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
                    'wpautop' => 1,
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
                <h3>Добавить новое фото в галерею мастера</h3>
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
function master_content_img($post){
    wp_nonce_field( basename( __FILE__ ), 'master_img_nonce_field' );
    $master_img_preview = tf_variable_exist(get_post_meta($post->ID,'_master_img_preview', true));
    $master_img_full    = tf_variable_exist(get_post_meta($post->ID,'_master_img_full', true));


    ?>
    <table class="add-box">

        <tr valign="top">
            <td>
                <h3 style="text-align: center;">Превью мастера <br>(280px X 425px):</h3>
                <?php echo tf_img_upload('master_img_preview',$master_img_preview,'50%','auto'); ?>
            </td>
        </tr>
        <tr valign="top">
            <td>
                <h3 style="text-align: center;">Фото личного кабинета мастера <br>(1150px X 440px):</h3>
                <?php echo tf_img_upload('master_img_full',$master_img_full,'50%','auto'); ?>
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
        update_post_meta($post->ID,'_master_first_name', sanitize_text_field($_POST['master_first_name']));
        update_post_meta($post->ID,'_master_second_name', sanitize_text_field($_POST['master_second_name']));
        update_post_meta($post->ID,'_master_quote', sanitize_text_field($_POST['master_quote']));
        update_post_meta($post->ID,'_master_content', $_POST['master_content']);

        update_post_meta($post->ID,'_master_galery', $_POST['master_galery']);
    }
    return $post_id;
}
function master_content_img_save ( $post_id ) {
    // проверяем, пришёл ли запрос со страницы с метабоксом
    if ( !isset( $_POST['master_img_nonce_field'] )
        || !wp_verify_nonce( $_POST['master_img_nonce_field'], basename( __FILE__ ) ) )
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
    {
        update_post_meta($post->ID,'_master_img_preview', $_POST['master_img_preview']);
        update_post_meta($post->ID,'_master_img_full', $_POST['master_img_full']);
    }
    return $post_id;
}
add_action('save_post', 'master_content_save');
add_action('save_post', 'master_content_img_save');

/**
* Функция добавляет дополнительные поля на страницу создания мастера
*/
function load_master_content() {
    add_meta_box('master_box_id', 'Настройка данных мастера', 'master_content', array('barber-master', 'tattoo-master'), 'normal', 'high');
    add_meta_box('master_foto_box_id', 'Фото мастера', 'master_content_img', array('barber-master', 'tattoo-master'), 'side', 'low');
}
add_action( 'admin_menu', 'load_master_content' );

/**
 * Функция добавляет дополнительные колонки в админку
 */
function add_master_column( $columns ){
    $columns['img'] = 'Миниатюра';
    $columns['first_name'] = 'Имя';
    $columns['second_name'] = 'Фамилия';
    unset($columns['date']);
    return $columns;
}
add_filter('manage_edit-barber-master_columns', 'add_master_column', 4);
add_filter('manage_edit-tattoo-master_columns', 'add_master_column', 4);

/**
 * Функция добавляет значения в дополнительные колонки админки
 */
function fill_views_master_column($column_name, $post_id) {
    if( $column_name == 'first_name' ) {
        $master_first_name  = tf_variable_exist(get_post_meta($post_id,'_master_first_name', true));
        echo '<span style="color:black; font-style: italic; font-weight: bold; font-size: 16px;">'.$master_first_name.'</span>';
    }
    if( $column_name == 'second_name' ) {
        $master_second_name = tf_variable_exist(get_post_meta($post_id,'_master_second_name', true));
        echo '<span style="color:black; font-style: italic; font-weight: bold; font-size: 16px;">'.$master_second_name.'</span>';
    }
    if( $column_name == 'img' ) {
        $url = wp_get_attachment_image_url(tf_variable_exist(get_post_meta($post_id,'_master_img_preview', true)), 'master-preview');
        echo '<img src="'.$url.'" style="width:auto; height:150px;"/>';
    }
}
add_filter('manage_barber-master_posts_custom_column', 'fill_views_master_column', 2, 2);
add_filter('manage_tattoo-master_posts_custom_column', 'fill_views_master_column', 2, 2);