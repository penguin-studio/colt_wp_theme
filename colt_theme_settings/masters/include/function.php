<?php
/**
 * User: Максим Руденко
 * Date: 01.03.2016
 * Файл функций
 */

/**
 * Ункция отвечает за вывод галереи в админке
 * @param $galery_list массив галереи
 * @return int|string
 */
function master_admin_view_galery($galery_list){
    if(tf_variable_exist($galery_list)){
        if(count($galery_list) > 0) {
            $current_id = count($galery_list) - 1;
            $galery = "";
            $default = colt_theme_settings_directory_uri . '/admin/images/no-logo.png';
            foreach ($galery_list as $galery_item) {
                 $img_url = $default;
                 if($galery_item != ""){
                     $img_url = wp_get_attachment_image_url($galery_item,150,150);
                 }
                 $galery .= '
                    <div id="gimg'.$current_id.'" class="galery-img">
                    <img src="'.esc_url($img_url).'" class="galery-img-class" />
                    <div >
                        <input type="hidden" name="master_galery[]" id="" value="'.$galery_item.'" />
                        <button type="button" class="upload_galery_image_button button">Загрузить</button>
                        <button type="button" gimg="'.$current_id.'" class="remove_galery_image_button button">&times;</button>
                    </div>
                </div>
                 ';
                $current_id --;
            }
            return $galery;
        }
    }
    return 0;
}


function master_template_view_galery($galery_list){
    if(tf_variable_exist($galery_list)){
        if(count($galery_list) > 0) {

            $galery = "";
            foreach ($galery_list as $galery_item) {
                $img_url  = "";
                $img_full = "";
                if($galery_item != ""){
                    $img_url  = wp_get_attachment_image_url($galery_item,array(300,300));
                    $img_full = wp_get_attachment_image_url($galery_item,'full');
                }
                $galery .= '
                    <li>
                        <a href="'.esc_url($img_full).'" class="fancybox" rel="fancybox" title="">
                        <img src="'.esc_url($img_url).'">
                        </a>
                    </li>
                 ';

            }
            return $galery;
        }
    }
    return 0;
}