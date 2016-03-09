<?php

// подключение меню
add_action('after_setup_theme', function(){
    register_nav_menus( array(
        'header_menu' => 'Меню в шапке'
    ) );
});
// подключение меню конец
add_theme_support('post-thumbnails');

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Боковая колонка интернет магазина',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

// Подключение настроек темы
require get_template_directory() . '/colt_theme_settings/colt_theme_settings.php';

