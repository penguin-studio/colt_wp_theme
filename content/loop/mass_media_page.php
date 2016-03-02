<?php
/**
 * User: Максим Руденко
 * Date: 02.03.2016
 */
global $post;
global $wp_query;
$temp = $wp_query;
$wp_query = null;

$options = get_option( 'theme_settings' );
$mass_media_about_us = isset($options['mass_media_about_us'])?$options['mass_media_about_us']:0;

if($mass_media_about_us) {

    $args = array(
        'post_type' => 'post',
        'order' => 'ASC',
        'ignore_sticky_posts' => true
    );
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array($mass_media_about_us)
        )
    );

    $wp_query = new WP_Query($args);

    $result = '';

    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {

            $wp_query->the_post();

            $mass_media_date = get_post_meta($post->ID, '_mass_media_date', true);
            $mass_media_site = get_post_meta($post->ID, '_mass_media_site', true);
            $mass_media_date = isset($mass_media_date) ? get_post_meta($post->ID, '_mass_media_date', true) : '';
            $mass_media_site = isset($mass_media_site) ? get_post_meta($post->ID, '_mass_media_site', true) : '';


            $post_url = get_permalink($post->ID);
            $post_excerpt = get_the_excerpt();
            $post_title = get_the_title($post->ID);

            $default_mass_media_img_url = get_template_directory_uri() . '/img/default_mass_media_image.jpg';
            $mass_media_img_url = wp_get_attachment_image_url(get_post_meta($post->ID, '_mass_media_img', true), 'mass-media-thumbnail');
            if (!$mass_media_img_url) {
                $mass_media_img_url = $default_mass_media_img_url;
            }
            ?>
            <div class="col-md-6 blog-post-container mass-media-container">
                <img src="<?php echo esc_url($mass_media_img_url); ?>" alt="mass-media-post">
                <div class="blog-post-container__text mass-media-container__text">
                    <div class="mass-media__label">
                        <span class="pull-left mass-media__name"><?php echo esc_html($mass_media_site); ?></span>
                        <span class="pull-right mass-media__date"><?php echo esc_html($mass_media_date); ?></span>
                    </div>
                    <h3 class="blog-post-container__text-title"><?php echo esc_html($post_title); ?></h3>
                    <?php echo $post_excerpt; ?>
                    <a href="<?php echo esc_url($post_url); ?>" class="blog-post-container__text-link">Читати далі</a>
                </div>
            </div>
            <?php
        }
    }
}

$wp_query = null;
$wp_query = $temp;
wp_reset_postdata();