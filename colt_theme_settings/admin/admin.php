<?php
/**
 * Файл отвечает за Подключение файлов Опции темы
 * User: Руденко Максим
 * Date: 25.02.2016
 */

//Добавление стилей для админки
function colt_theme_admin_enqueue_options_style() {
    wp_enqueue_style( 'colt_theme_admin_options_style', colt_theme_settings_directory_uri . '/admin/css/style.css' );
}
add_action( 'admin_enqueue_scripts', 'colt_theme_admin_enqueue_options_style' );

//Добавление скриптов для админки
function colt_theme_admin_js() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    wp_enqueue_script( 'colt_theme_admin_script', colt_theme_settings_directory_uri . '/admin/js/script.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'colt_theme_admin_js' );

//Подключение php файлов
require colt_theme_settings_directory . '/admin/include/template.php';
require colt_theme_settings_directory . '/admin/include/function.php';
