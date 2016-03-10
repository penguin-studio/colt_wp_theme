<?php
/**
 * Created by PhpStorm.
 * User: Эзиз
 * Date: 09.03.2016
 * Time: 21:03
 */

//woocommerce настройка
//Отключение стандартных css стилей
define('WOOCOMMERCE_USE_CSS', false);

//Добавление поддержки темой woocommerce
add_theme_support( 'woocommerce' );

//Убираем заголовок страницы выводимой с помощью woocommerce_content()
add_filter('woocommerce_show_page_title','no_title',10);
function no_title(){return false;}

//Отключаем добавление в хуке woocommerce_before_shop_loop_item_title
//функции по выводу картинки поста
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail');
//Отключаем вывод ссылки
//remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open');
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close');
//Перемещение ссылок в другое место перед и после картинки
//add_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',5);
add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',5);

//Отключаем вывод title
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title');
//Отключаем вывод сортировки и количество записей на странице
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );



//Добавление файла стилей
function colt_woo_add_style() {
    wp_enqueue_style( 'colt_woocommerce_style', colt_theme_settings_directory_uri . '/colt_woocommerce/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'colt_woo_add_style' );
add_action( 'wp_enqueue_scripts', function(){
    if ( is_home() || is_front_page() || ( is_woocommerce() && is_archive() ) ) {
        wp_enqueue_script( 'frontend-custom', colt_theme_settings_directory_uri . '/colt_woocommerce/js/script.js', array('jquery'));
add_thickbox();
}
});


require colt_theme_settings_directory . '/colt_woocommerce/include/function.php';
