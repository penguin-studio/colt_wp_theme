<?php
/**
 * User: Максим Руденко
 * Date: 28.02.2016
 */

function services_init(){
    register_setting( 'services', 'services' );
}
add_action( 'admin_init', 'services_init' );

function services_page_add() {
    add_menu_page( __( 'Услуги' ), __( 'Услуги' ), 'manage_options', 'servicespage', 'services_page',  'dashicons-list-view', 28);
}
add_action( 'admin_menu', 'services_page_add' );

function services_page() {
    global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;
    ?>
    <div class="theme-option-main-block">
        <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
            <div id="message" class="updated">
                <p><strong>Настройки сохранены</strong></p>
            </div>
        <?php endif; ?>
        <div>
            <h1>Страница услуг</h1>
            <form method="post" action="options.php">
                <?php settings_fields( 'services' ); ?>
                <?php $options = get_option( 'services' ); ?>

                <div id="container">
                    <div class="tabs">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1" title="">Услуги</label>
                    <!--
                        <input id="tab2" type="radio" name="tabs">
                        <label for="tab2" title=""></label>

                        <input id="tab3" type="radio" name="tabs">
                        <label for="tab3" title=""></label>

                        <input id="tab4" type="radio" name="tabs">
                        <label for="tab4" title=""></label>
                    -->
                        <section id="content1">
                            <table id="add-service-field-area" class="theme-option-table table-block" >
                                <thead>
                                <th colspan="4">
                                    <span>Название услуги</span>
                                    <input type="text" id="service_name" style="width: 300px;" placeholder="Название услуги">
                                    <span style="margin-left: 20px;">Цена услуги</span>
                                    <input type="text" id="service_price" style="width: 100px;" placeholder="Цена услуги">
                                    <input style="margin-left: 20px;" type="button" id="add_service_button" value="Добавить услугу">
                                </th>
                                </thead>
                                <tr>
                                    <td><h3>№</h3></td>
                                    <td><h3>Услуга</h3></td>
                                    <td><h3>URL-страницы</h3></td>
                                    <td><h3>Цена</h3></td>
                                    <td><h3>Действие</h3></td>
                                </tr>
                                <?php
                                if(isset($options['service'])):
                                    ?>
                                        <input type="hidden" id="page-select" value="<?php echo str_replace('"','\'',tf_view_pages('services[service][%key%][url]','')); ?>">
                                    <?php
                                foreach($options['service'] as $key=>$service):

                                    $title = isset($service['title'])?$service['title']:'';
                                    $price = isset($service['price'])?$service['price']:'';
                                    $url   = isset($service['url'])?$service['url']:'#';

                                    ?>
                                    <tr id="s<?php echo $key; ?>" class="service">
                                    <td><?php echo (esc_html(tf_variable_exist($key))+1); ?></td>
                                    <td><input type="text" name="services[service][<?php echo $key; ?>][title]" value="<?php echo esc_attr($title); ?>" style="width: 300px;" placeholder="Название услуги"></td>
                                        <td>
                                            <?php echo tf_view_pages('services[service]['.$key.'][url]',$url); ?>
                                        </td>
                                        <td></span><input type="text" name="services[service][<?php echo $key; ?>][price]" value="<?php echo esc_attr($price); ?>" style="width: 300px;" placeholder="Цена услуги"></td>
                                        <td><input type="button" id="delete-service" s-id="<?php echo esc_attr(tf_variable_exist($key)); ?>" value="Удалить услугу"></td>
                                    </tr>
                                    <?php
                                endforeach;
                                endif;
                                ?>
                            </table>
                        </section>
                        <section id="content2">
                        </section>
                        <section id="content3">
                        </section>
                        <section id="content4">
                        </section>
                    </div>
                </div>
                <p><input name="submit" id="submit" class="button button-primary my-button-primary" value="Сохранить" type="submit"></p>
            </form>
        </div>
    </div>
<?php }