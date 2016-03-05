<?php
/**
 * User: Максим Руденко
 * Date: 29.02.2016
 */
    $options = get_option( 'services' );
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks about-us col-md-12">
                <h2 class="main-blocks__title">Послуги</h2>
                <div class="col-md-6 col-md-offset-3">
                    <table class="table-responsive">
                        <?php
                        if(tf_variable_exist($options['service'])):
                            foreach($options['service'] as $key=>$service):
                                $title = isset($service['title'])?$service['title']:'';
                                $price = isset($service['price'])?$service['price']:'';
                                $url   = isset($service['url'])?$service['url']:'#';
                                ?>
                                <tr>
                                    <td><a href="<?php echo $url; ?>"><?php echo esc_attr($title); ?></a></td>
                                    <td><?php echo esc_attr($price); ?></td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </table>
                    <div class="wrapp-check-online">
                        <a class="check-online ms_booking" data-url="https://yclients.com/booking/34027/2/1" href="#">Запис онлайн</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
