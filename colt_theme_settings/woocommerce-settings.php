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

add_action('woocommerce_before_shop_loop_item_title','colt_woocommerce_template_loop_product_thumbnail');

function colt_woocommerce_template_loop_product_thumbnail(){
    global $post;
    $template = "<img src='%src%' alt='%alt%' />";

    $img_src = get_the_post_thumbnail_url($post->ID,array(280,425));
    $img_alt = get_the_title($post->ID);

    $template = str_replace('%src%',$img_src,$template);
    $template = str_replace('%alt%',$img_alt,$template);
    return print $template;
}