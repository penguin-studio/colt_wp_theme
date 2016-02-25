<?php
/**
 * Файл отвечает за Функции для Опций темы
 * User: Руденко Максим
 * Date: 25.02.2016
 */


//Регистрация функции настроек
function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
}
// Добавление настроек в меню страницы
function add_settings_page() {
    add_menu_page( __( 'Опции темы' ), __( 'Опции темы' ), 'manage_options', 'settings', 'theme_settings_page');
}
//Добавление действий
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );


/**
 * Функция добавляет поле для выбора и загрузки фотографии, картинки
 * Аргументы:
 * Имя функции, Значение, Ширина (не обязательный), Высота (не обязательный)
 * Возвращаемое значение: поле для выбора картинки загружаемой из или в медиабиблиотеку
 * !!Требует реставрации
 * Дата: 25.02.2016
 */
function tf_img_upload($name, $value = '', $w = 115, $h = 'auto') {
    $default = colt_theme_settings_directory_uri . '/admin/images/no-logo.png';
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
			<button type="button" class="upload_image_button button">Загрузить</button>
			<button type="button" class="remove_image_button button">&times;</button>
		</div>
	</div>
	';
}

/**
 * Функция проверяет существование переменной
 * Аргументы: Переменная
 * Возвращаемое значение: Значение переменной или в случае отсутствия пустая строка
 * Дата: 26.02.2016
 */
function tf_variable_exist($variable){
    return isset($variable)?$variable:'';
}
