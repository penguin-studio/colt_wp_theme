<?php
/**
 * User: Максим Руденко
 * Date: 02.03.2016
 * Цикл вывода страницы блога
 */

global $post;
global $wp_query;
$temp = $wp_query;
$wp_query = null;

$options = get_option( 'theme_settings' );
$mass_media_about_us = isset($options['mass_media_about_us'])?$options['mass_media_about_us']:0;


$args = array(
    'post_type' => 'post',
    'order' => 'ASC',
    'ignore_sticky_posts'=>true
);
if($mass_media_about_us != 0) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array($mass_media_about_us),
            'operator' => 'NOT IN'
        )
    );
}

$wp_query = new WP_Query($args);

$result = '';

if ($wp_query->have_posts()){
while ($wp_query->have_posts()) {
$wp_query->the_post();

$default_post_thumbnail_url = get_template_directory_uri().'/img/default-blog-post-image.jpg';
$post_thumbnail_url = get_the_post_thumbnail_url($post->ID, 'master-full-screen');//Размер 1150х440
$post_thumbnail_url = ($post_thumbnail_url == '')?$default_post_thumbnail_url:$post_thumbnail_url;

$post_url       = get_permalink($post->ID);
$post_excerpt   = get_the_excerpt();
$post_title     = get_the_title($post->ID);

$res = '
<div class="row">
    <div class="col-md-12 blog-post-container">
        <img src="'.esc_attr($post_thumbnail_url).'" alt="blog-post">
        <div class="blog-post-container__text">
            <h3 class="blog-post-container__text-title">'.esc_html($post_title).'</h3>
                '.$post_excerpt.'
            <a href="'.esc_url($post_url).'" class="blog-post-container__text-link">Читать дальше</a>
        </div>
    </div>
</div>
';
$result .= $res;

}
}

echo $result;

$wp_query = null;
$wp_query = $temp;
wp_reset_postdata();
