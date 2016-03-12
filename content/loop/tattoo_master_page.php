<?php
/**
 * User: Максим Руденко
 * Date: 01.03.2016
 * Файл отвечает за вывод цыкла татуировщиков на странице тату мастеров
 */
global $post;
global $wp_query;
$temp = $wp_query;
$wp_query = null;

$args = array(
    'post_type' => 'tattoo-master',
    'order' => 'ASC',
    'ignore_sticky_posts'=>true
);

$wp_query = new WP_Query($args);

$result = '';

if ($wp_query->have_posts()){
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        
        $master_first_name  = tf_variable_exist(get_post_meta($post->ID,'_master_first_name', true));
        $master_second_name = tf_variable_exist(get_post_meta($post->ID,'_master_second_name', true));
        $master_img_preview = tf_variable_exist(get_post_meta($post->ID,'_master_img_preview', true));

        $img_url = wp_get_attachment_image_url($master_img_preview,'master-preview');
        $master_page_url = get_permalink($post->ID);
        $master_name = $master_first_name.' '.$master_second_name;

        $res = '
                            <div class="col-md-6 personal-pages">
                                <div class="col-md-6">
                                    <img src="'.$img_url.'" alt="master">
                                </div>
                                <a href="'.esc_url($master_page_url).'" class="col-md-6 enter-personal-page">
                                    <h3 class="enter-personal-page__title">'.esc_html($master_name).'</h3>
                                    <span class="enter-personal-page__logo"></span>
                                    <span class="enter-personal-page__link">переглянути профіль</span>
                                </a>
		                    </div>
                            ';
        $result .= $res;

    }
}

echo $result;

$wp_query = null;
$wp_query = $temp;
wp_reset_postdata();