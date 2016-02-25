<?php
/**
 * Файл отвечает за Подключение файлов Опции темы
 * User: Руденко Максим
 * Date: 25.02.2016
 */
function colt_theme_admin_enqueue_options_style() {
    wp_enqueue_style( 'colt_theme_admin_options_style', $colt_theme_settings_directory_uri . '/admin/style/style.css' );
}
add_action( 'admin_enqueue_scripts', 'colt_theme_admin_enqueue_options_style' );

require $colt_theme_settings_directory . '/admin/template.php';
require $colt_theme_settings_directory . '/admin/function.php';
