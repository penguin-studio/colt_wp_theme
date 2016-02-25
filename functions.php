<?php

// подключение меню
add_action('after_setup_theme', function(){
    register_nav_menus( array(
        'header_menu_left_side' => 'Меню в шапке левое',
        'header_menu_right_side' => 'Меню в шапке правое'
    ) );
});
// подключение меню конец
add_theme_support('post-thumbnails');



// Подключение настроек темы
require get_template_directory() . '/colt_theme_settings/colt_theme_settings.php';
