<?php

// подключение меню
add_action('after_setup_theme', function(){
    register_nav_menus( array(
        'header_menu' => 'Меню в шапке'
    ) );
});
// подключение меню конец
add_theme_support('post-thumbnails');



// Подключение настроек темы
require get_template_directory() . '/colt_theme_settings/colt_theme_settings.php';
