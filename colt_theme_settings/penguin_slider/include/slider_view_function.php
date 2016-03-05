<?php
/**
 * User: Максим Руденко
 * Date: 28.02.2016
 * В файле размещены функции для вывода слайдера в фронтенде
 */

/**
 * @param $args
 *      before_img - до вывода img
 *      after_img - после вывода img
 *      container_start - Внешний контейнеh до вывода списка
 *      conteiner_end - Внешний контейнеh после вывода фото
 *      slider_slug - ярлык слайдера - какой слайдер выводить
 *
 * @return string
 */
function slider_view($args)
{
    $before_img      = isset($args['before_img'])?$args['before_img']:'';
    $after_img       = isset($args['after_img'])?$args['after_img']:'';
    $container_start = isset($args['container_start'])?$args['container_start']:'';
    $container_end   = isset($args['container_end'])?$args['container_end']:'';
    $slider_slug     = isset($args['slider_slug'])?$args['slider_slug']:'';

    global $post;
    global $wp_query;
    $temp = $wp_query;
    $wp_query = null;

    $args = array(
        'post_type' => 'slider',
        'posts_per_page' => -1,
        'order' => 'ASC',

        'meta_key' => 'slide_position',
        'orderby' => 'meta_value_num',

        'meta_query' => array(
            'key'     => 'slide_status',
            'value'   => '1',
            'type' => 'numeric'
        ),

        'tax_query' => array(
            array(
                'taxonomy' => 'slider_cat',
                'field' => 'slug',
                'terms' => $slider_slug)
        ),
        'ignore_sticky_posts'=>true
    );

    $wp_query = new WP_Query($args);
    if($wp_query->post_count == 0){
        return '<!-- В слайдере нет елементов -->';
    }

    $slider_content = '';

    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
            $src = slider_variable_exist(get_post_meta($post->ID,'slide_img', true));
            $slide_src = slider_variable_exist(wp_get_attachment_image_url($src,'full'));
            $slide_img_title = slider_variable_exist(get_post_meta($post->ID,'slide_img_title', true));
            $slide_url = slider_variable_exist(get_post_meta($post->ID,'slide_url', true));

            //Формирование елемента фото слайда + его контеинер
            $slide_item = '<a href="'.esc_url($slide_url).'"><img src="'.esc_attr($slide_src).'" alt="'.esc_attr($slide_img_title).'" /></a>';
            $slide_item = $before_img.$slide_item.$after_img;
            $slider_content .= $slide_item;

        endwhile;
    endif;

    $wp_query = null;
    $wp_query = $temp;
    wp_reset_postdata();

    $slider_content = $container_start.$slider_content.$container_end;

    return $slider_content;
}


function slider_variable_exist($variable){
    return isset($variable)?$variable:'';
}