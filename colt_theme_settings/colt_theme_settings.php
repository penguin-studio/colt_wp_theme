<?php
/**
 * Файл отвечает за Подключение настроек темы
 * User: Руденко Максим
 * Date: 25.02.2016
 */

//Переменная отвечает за путь к папке с настройками темы
define('colt_theme_settings_directory',get_template_directory() . '/colt_theme_settings');
define('colt_theme_settings_directory_uri',get_template_directory_uri() . '/colt_theme_settings');

//Подключаем файл настроек страницы Настроек темы в админке
require colt_theme_settings_directory . '/admin/admin.php';
//Подключение слайдера
require colt_theme_settings_directory . '/penguin_slider/penguin_slider.php';