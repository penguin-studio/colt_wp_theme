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
                <h2 class="main-blocks__title">Посуги</h2>
                <div class="col-md-6 col-md-offset-3">
                    <table class="table-responsive">
                        <?php
                        if(tf_variable_exist($options['service'])):
                            foreach($options['service'] as $key=>$service):
                                ?>
                                <tr>
                                    <td><a href="#"><?php echo esc_attr(tf_variable_exist($service[0])); ?></a></td>
                                    <td><?php echo esc_attr(tf_variable_exist($service[1])); ?></td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </table>
                    <div class="wrapp-check-online">
                        <a class="check-online" href="#">Запис онлайн</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
