<?php
/**
 * User: Максим Руденко
 * Date: 29.02.2016
 */
?>
    <div class="container" id="contacts">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="main-blocks about-us col-md-12">
                    <h2 class="main-blocks__title">Контакти:</h2>
                    <?php
                    $options = get_option( 'theme_settings' );

                    $lat  = "50.448071";
                    $lang = "30.522062";
                    $zoom = "12";
                    $maps_lat = isset($options['maps_lat'])?$options['maps_lat']:'';
                    $maps_lng = isset($options['maps_lng'])?$options['maps_lng']:'';
                    $maps_zoom = isset($options['maps_zoom'])?$options['maps_zoom']:'';
                    $maps_marker = isset($options['maps_marker'])?$options['maps_marker']:'';

                    if($maps_lat != ''){
                        $lat = $maps_lat;
                    }
                    if($maps_lng != ''){
                        $lang = $maps_lng;
                    }
                    if($maps_zoom != ''){
                        $zoom = $maps_zoom;
                    }

                    $theme_path_uri = get_template_directory_uri();
                    $marker_url = $theme_path_uri.'/img/marker.png';
                    if($maps_marker){
                        $marker_url = wp_get_attachment_image_url($maps_marker, 'full');
                    }

                    ?>
                    <div class="map-wrapp" id="map" lat="<?php echo esc_attr($lat); ?>" lang="<?php echo esc_attr($lang); ?>" zoom="<?php echo esc_attr($zoom); ?>" marker="<?php echo esc_attr($marker_url); ?>" style="width: 100%; height: 300px;"></div>
                    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
                </div>
            </div>
        </div>
    </div>
