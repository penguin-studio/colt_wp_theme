<?php
/**
 * User: Максим Руденко
 * Date: 04.03.2016
 */

/**
 * @param $atts
 *      before_img - до вывода img
 *      after_img - после вывода img
 *      container_start - Внешний контейнеh до вывода списка
 *      conteiner_end - Внешний контейнеh после вывода фото
 *      slider_slug - ярлык слайдера - какой слайдер выводить
 *
 * @return string
 */
function slider_view_shortcode($atts){
    extract( shortcode_atts( array(
        'before_img' => '<li>',
        'after_img' => '</li>',
        'container_start' => '<div id="slider" class="slider">',
        'container_end' => '</div>',
        'slider_slug' => ''
    ), $atts ) );
    $args =array(
        'before_img' => $before_img,
        'after_img' => $after_img,
        'container_start' => $container_start,
        'container_end' => $container_end,
        'slider_slug' => $slider_slug
    );
    
    return slider_view($args);
}

add_shortcode( 'penguin_slider', 'slider_view_shortcode' );