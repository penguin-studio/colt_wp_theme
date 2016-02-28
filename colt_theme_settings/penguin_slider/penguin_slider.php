<?php
/**
 * User: Максим Руденко
 * Date: 28.02.2016
 * Файл инициализации слайдера
 */

//Добавление скриптов для админки
function penguin_slider_admin_js() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    wp_enqueue_script( 'penguin_slider_admin_script', colt_theme_settings_directory_uri . '/penguin_slider/js/script.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'penguin_slider_admin_js' );

require colt_theme_settings_directory . '/penguin_slider/include/slider_post_type.php';
require colt_theme_settings_directory . '/penguin_slider/include/slider_additional_fields.php';

require colt_theme_settings_directory . '/penguin_slider/include/slider_view_function.php';