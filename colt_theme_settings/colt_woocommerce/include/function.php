<?php
/**
 * Добавляем свой вывод миниатбры в каталог товаров woocommerce
 */
add_action('woocommerce_before_shop_loop_item_title','colt_woocommerce_template_loop_product_thumbnail');
function colt_woocommerce_template_loop_product_thumbnail(){
global $post;
$template = "<img src='%src%' alt='%alt%' />";

$img_src = get_the_post_thumbnail_url($post->ID,array(280,425));
$img_alt = get_the_title($post->ID);

$template = str_replace('%src%',$img_src,$template);
$template = str_replace('%alt%',$img_alt,$template);
return print $template;
}

/**
 * Добавляем свой вывод title ы каталог товаров woocommerce
 */
add_action('woocommerce_shop_loop_item_title','colt_woocommerce_template_loop_product_title');
function colt_woocommerce_template_loop_product_title(){
    global $post;
    $template = '<h4 class="bottom-menu__name">'.get_the_title($post->ID).'</h4>';

    return print $template;
}

/**
 * Оптимизация скриптов WooCommerce
 * Убираем WooCommerce Generator tag, стили, и скрипты для страниц, не относящихся к WooCommerce.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {
    //убираем generator meta tag
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

    //для начала проверяем, активен ли WooCommerce, дабы избежать ошибок
    if ( function_exists( 'is_woocommerce' ) ) {
        //отменяем загрузку скриптов и стилей
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }

}
add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // < 2.1
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // 2.1 +

function woo_custom_product_add_to_cart_text() {

    return __( 'Купити', 'woocommerce' );

}