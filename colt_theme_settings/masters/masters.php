<?php

//Добавление стилей для админки мастера
function master_admin_style() {
    wp_enqueue_style( 'master_admin_style', colt_theme_settings_directory_uri . '/masters/css/style.css' );
}
add_action( 'admin_enqueue_scripts', 'master_admin_style' );

//Добавление скриптов для админки
function master_admin_js() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    wp_enqueue_script( 'master_admin_script', colt_theme_settings_directory_uri . '/masters/js/script.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'master_admin_js' );

//Размер превью для мастеров
add_image_size( 'master-preview', 280, 425, true );

//Размер картинки для страницы мастера
add_image_size( 'master-full-screen', 1150, 440, true );

//Подключение типа барберов и татуировщиков
require colt_theme_settings_directory . '/masters/include/masters_post_type.php';

require colt_theme_settings_directory . '/masters/include/master_additional_fields.php';

require colt_theme_settings_directory . '/masters/include/function.php';