<?php
/**
 * User: Максим Руденкр
 * Date: 29.02.2016
 * Файл отвечает за подключения пользовательских типов - берберов и татуировщиков
 */

function barber_master_post_type() {
    $labels = array(
        'name' => 'Барбер Мастер',
        'singular_name' => 'Добавить барбер мастера', // админ панель Добавить->Функцию
        'add_new' => 'Добавить барбер мастера',
        'add_new_item' => 'Добавить барбер мастера', // заголовок тега <title>
        'edit_item' => 'Редактировать барбер мастера',
        'new_item' => 'Новый барбер мастер',
        'all_items' => 'Все барбер мастера' ,
        'view_item' => 'Посмотреть барбер мастера',
        'search_items' => 'Найти барбер мастера',
        'not_found' =>  'Барбер мастера не найдено',
        'not_found_in_trash' => 'Барбер мастера не найден в корзине.',
        'menu_name' => 'Барбер Мастер' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        'taxonomies' => array(),
        'menu_icon' => 'dashicons-businessman', // иконка в меню
        'menu_position' => 29, // порядок в меню
        'supports' => array('title','thumbnail')
    );
    register_post_type('barber-master', $args);
}
add_action( 'init', 'barber_master_post_type' );
function tattoo_master_post_type() {
    $labels = array(
        'name' => 'Тату Мастер',
        'singular_name' => 'Добавить тату мастера', // админ панель Добавить->Функцию
        'add_new' => 'Добавить тату мастера',
        'add_new_item' => 'Добавить тату мастера', // заголовок тега <title>
        'edit_item' => 'Редактировать тату мастера',
        'new_item' => 'Новый тату мастер',
        'all_items' => 'Все тату мастера' ,
        'view_item' => 'Посмотреть тату мастера',
        'search_items' => 'Найти тату мастера',
        'not_found' =>  'Тату мастер не найден',
        'not_found_in_trash' => 'Тату мастер не найден в корзине.',
        'menu_name' => 'Тату Мастер' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        'taxonomies' => array(),
        'menu_icon' => 'dashicons-businessman', // иконка в меню
        'menu_position' => 30, // порядок в меню
        'supports' => array('title','thumbnail')
    );
    register_post_type('tattoo-master', $args);
}
add_action( 'init', 'tattoo_master_post_type' );