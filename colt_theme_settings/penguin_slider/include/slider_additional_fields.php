<?php
/**
 * User: Максим Руденко
 * Date: 28.02.2016
 * Файл отвечает за инициализацию полей в форме добавления слайда
 */

/**
 * Функция отвечает за формирование отображения полей страницы добавления слайда
 */
function slider_content($post){

    wp_nonce_field( basename( __FILE__ ), 'slider_content' );

    $slide_status    = get_post_meta($post->ID,'slide_status', true);
    $slide_img 			 = get_post_meta($post->ID,'slide_img', true);
    $slide_img_title = get_post_meta($post->ID,'slide_img_title', true);
    $slide_url 			 = get_post_meta($post->ID,'slide_url', true);
    $slide_position  = get_post_meta($post->ID,'slide_position', true);

    ?>
    <table class="add-box">
        <tr valign="top">
            <td><h3>Статус:</h3>
                <select name="slide_status" />
                <option value="0" <?php selected( slider_variable_exist($slide_status), '0' )?> >Не показывать</option>
                <option value="1" <?php selected( slider_variable_exist($slide_status), '1' )?> >Показывать</option>
                </select>
                <label> - Выберите статус видимости слайда. </label></td>
        </tr>
    </table>
    <table class="add-box">
        <tr valign="top">
            <?php
                if(slider_variable_exist($slide_position) == ''){
                    $slide_position = 1;
                }
            ?>
            <td><h3>Укажите позицию в слайдере:</h3><input type="number" min="0" max="10" step="1" size="50" name="slide_position" value="<?php echo esc_attr($slide_position); ?>" />
                <label> - Укажите позицию в слайдере. </label>
            </td>
        </tr>
    </table>
    <table class="add-box">
        <tr valign="top">
            <td>
                <h3>Картинка слайда:</h3><?php echo slider_img_upload('slide_img', slider_variable_exist($slide_img), 350); ?>
            </td>
        </tr>
    </table>
    <table class="add-box">
        <tr valign="top">
            <td>
                <h3>Заголовок слайда:</h3><input type="text" size="50" name="slide_img_title" value="<?php echo esc_attr(slider_variable_exist($slide_img_title)); ?>" placeholder="Заголовок слайдера" />
                <label> - Укажите заголовок сайта. </label>
            </td>
        </tr>
    </table>
    <table class="add-box">
        <tr valign="top">
            <td><h3>Ссылка слайда:</h3><input type="text" size="50" name="slide_url" value="<?php echo esc_attr(slider_variable_exist($slide_url)); ?>" placeholder="URL слайдера"/>
                <label> - Укажите URL слайда. </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Функция сохранения дополнительных полей слайда
 */
function slider_content_save ( $post_id ) {
    // проверяем, пришёл ли запрос со страницы с метабоксом
    if ( !isset( $_POST['slider_content'] )
        || !wp_verify_nonce( $_POST['slider_content'], basename( __FILE__ ) ) )
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
    if ($post->post_type == 'slider')
    { // укажите собственный
        update_post_meta($post->ID,'slide_status', $_POST['slide_status']);
        update_post_meta($post->ID,'slide_img', $_POST['slide_img']);
        update_post_meta($post->ID,'slide_img_title', $_POST['slide_img_title']);
        update_post_meta($post->ID,'slide_url', $_POST['slide_url']);
        update_post_meta($post->ID,'slide_position', $_POST['slide_position']);
    }
    return $post_id;
}
add_action('save_post', 'slider_content_save');

/**
 * Функция добавляет дополнительные поля на страницу создания слайда
 */
function load_slider_content() {
    add_meta_box('addit_box_id', 'Слайд', 'slider_content', 'slider', 'normal', 'high');
}
add_action( 'admin_menu', 'load_slider_content' );
add_filter('manage_edit-slider_columns', 'add_column', 4);
/**
 * Функция добавляет дополнительные колонки в админку
 */
function add_column( $columns ){
    $columns['display'] = 'Видимость';
    $columns['slider'] = 'Слайдер';
    $columns['slide_position'] = 'Позиция в слайдере';
    $columns['img'] = 'Миниатюра';
    unset($columns['date']);
    return $columns;
}
add_filter('manage_slider_posts_custom_column', 'fill_views_column', 2, 2); // wp-admin/includes/class-wp-posts-list-table.php

/**
 * Функция добавляет значения в дополнительные колонки админки
 */
function fill_views_column($column_name, $post_id) {
    if( $column_name == 'display' ) {
        $slide_status = get_post_meta($post_id, 'slide_status', true);

        if ($slide_status == 0) {
            echo '<span style="color:red;font-weight: bold; font-size: 16px;">Скрыт</span>';
        } else {
            echo '<span style="color:green;font-weight: bold; font-size: 16px;">Показан</span>';
        }
    }
    if( $column_name == 'img' ) {
        $url = wp_get_attachment_image_url(get_post_meta($post_id,'slide_img', true), 'small');
        echo '<img src="'.$url.'" style="width:100%; height:auto;"/>';
    }
    if( $column_name == 'slider' ) {
        $slider_names = '';
        if($tax = get_the_terms( $post_id, 'slider_cat' )) {
            foreach ($tax as $item) {
                $slider_names .= $item->name . '; ';
            }
        }
        if($slider_names == ''){
            echo '<i>Без слайдера</i>';
        }else {
            echo '<i>'.$slider_names.'</i>';
        }
    }
    if( $column_name == 'slide_position' ) {
        $slide_position  = get_post_meta($post_id,'slide_position', true);
        echo '<span style="color: #000; font-size: 20px; font-weight: bold; ">'.$slide_position.'</span>';
    }
}

/**
 * Вывод блока выбора изображения из медиагалереи
 */
function slider_img_upload($name, $value = '', $w = 115, $h = 'auto') {
    $default = colt_theme_settings_directory_uri . '/penguin_slider/images/no-logo.png';
    if( $value ) {
        $image_attributes = wp_get_attachment_image_src( $value, 'full' );
        $src = $image_attributes[0];
    } else {
        $src = $default;
    }

    return '
	<div>
		<img data-src="'.$default.'" src="'.$src.'" width="'.$w.'px" height="'.$h.'px" />
		<div>
			<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.$value.'" />
			<button type="button" id="upload_slider_image_button" class="upload_image_button button">Загрузить</button>
			<button type="button" id="remove_slider_image_button" class="remove_image_button button">&times;</button>
		</div>
	</div>
	';
}
