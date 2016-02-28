<?php
/**
 * User: Максим Руденко
 * Date: 29.02.2016
 */
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="main-blocks about-us col-md-12">
                    <h2 class="main-blocks__title">Контакти</h2>
                    <?php
                    $lat  = "50.448071";
                    $lang = "30.522062";
                    $zoom = "12";
                    if(tf_variable_exist($options['maps_lat']) && $options['maps_lat'] != ''){
                        $lat = $options['maps_lat'];
                    }
                    if(tf_variable_exist($options['maps_lng']) && $options['maps_lng'] != ''){
                        $lang = $options['maps_lng'];
                    }
                    if(tf_variable_exist($options['maps_zoom']) && $options['maps_zoom'] != ''){
                        $zoom = $options['maps_zoom'];
                    }

                    $theme_path_uri = get_template_directory_uri();
                    $marker_url = $theme_path_uri.'/img/marker.png';
                    if(tf_variable_exist($options['maps_marker'])){
                        $marker_url = wp_get_attachment_image_url($options['maps_marker'], 'full');
                    }

                    ?>
                    <div class="map-wrapp" id="map" lat="<?php echo esc_attr($lat); ?>" lang="<?php echo esc_attr($lang); ?>" zoom="<?php echo esc_attr($zoom); ?>" marker="<?php echo esc_attr($marker_url); ?>" style="width: 100%; height: 300px;"></div>
                    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
                </div>
            </div>
        </div>
    </div>
