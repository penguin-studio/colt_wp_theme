<?php
/**
 * User: Максим Руденко
 * Date: 01.03.2016
 * Файл отвечает за формирование одиночной страницы мастера
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks col-md-12">
                <?php
                global $post;
                
                

                $master_first_name  = tf_variable_exist(get_post_meta($post->ID,'_master_first_name', true));
                $master_second_name = tf_variable_exist(get_post_meta($post->ID,'_master_second_name', true));
                $master_img_full    = tf_variable_exist(get_post_meta($post->ID,'_master_img_full', true));
                $master_quote       = tf_variable_exist(get_post_meta($post->ID,'_master_quote', true));
                $master_content     = tf_variable_exist(get_post_meta($post->ID,'_master_content', true));
                $master_galery      = tf_variable_exist(get_post_meta($post->ID,'_master_galery', true));

                $img_url = wp_get_attachment_image_url($master_img_full,'master-full-screen');
                $master_page_url = get_permalink($post->ID);

                $master_name = $master_first_name.' '.$master_second_name;

                $master_type = "";
                if($post->post_type == 'barber-master'){
                    $master_type = 'Барбер майстер';
                }
                if($post->post_type == 'tattoo-master'){
                    $master_type = 'Тату майстер';
                }

                ?>
                <h2 class="main-blocks__title main-blocks__title-personal"><?php echo esc_html($master_name); ?></h2>
	                <h3 class="main-blocks__title main-blocks__title-desc"><?php echo esc_html($master_type); ?></h3>
	                <div class="row">
		                <div class="col-md-12 personal-photo" style="background-image: url('<?php echo esc_html($img_url); ?>');">
                            <?php if($master_quote != ''): ?>
			                <blockquote class="personal-quote"><?php echo esc_html($master_quote); ?></blockquote>
		                    <?php endif; ?>
                        </div>
	                </div>
	                <div class="row row-description">
		                <div class="col-md-12 personal-description">
			                <div class="personal-description__text">
                                <?php echo $master_content; ?>
			                </div>
		                </div>
	                </div>
	                <div class="row">
		                <h3 class="main-blocks__title main-blocks__title-desc">Роботи майстра</h3>
		                <ul class="master-works">
			                <?php echo master_template_view_galery($master_galery); ?>
		                </ul>
		                <div class="wrapp-check-online">
			                <a class="check-online" href="#">Запис онлайн</a>
		                </div>
	                </div>
            </div>
        </div>

    </div>
</div>
