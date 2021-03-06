<?php
/**
 * User: Максим Руденко
 * Date: 01.03.2016
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks about-us col-md-12">
                <h2 class="main-blocks__title">Тату мастера:</h2>
                <div class="tatoo-slider">
                    <ul class="lightSlider card-box">
                        <?php
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
                            <li>
                                <div class="card-box__wrapp">
                                    <img src="'.$img_url.'">
                                    <div class="bottom-menu">
                                        <h4 class="bottom-menu__name">'.esc_html($master_name).'</h4>
                                        <p class="bottom-menu__name-desc">Тату мастер</p>
                                        <a class="bottom-menu__link" href="'.esc_url($master_page_url).'">Просмотреть профиль</a>
                                        <a class="bottom-menu__link" href="'.esc_url($master_page_url).'">Переглянути профіль</a>
                                    </div>
                                </div>
                            </li>
                            ';
                                $result .= $res;

                            }
                        }

                        echo $result;

                        $wp_query = null;
                        $wp_query = $temp;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
                <div class="wrapp-check-online">
                    <a class="check-online ms_booking" data-url="https://yclients.com/booking/34027/2/1" href="#" onClick="ga('send', 'event', { eventCategory: 'запись онлайн', eventAction: 'заказ'});">Запись онлайн</a>
                </div>
            </div>
        </div>
    </div>
</div>
