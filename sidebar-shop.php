<?php
/**
 * User: Максим Руденко
 * Date: 10.03.2016
 * Сайдбар магазина
 */
?>
<nav class="categories">
<h3 class="categories-title">Категорії</h3>
<?php
    $links = array();
    if(function_exists('woocommerce_get_cat_url')):
    $links =  woocommerce_get_cat_url();
        if(count($links)):
?>
<ul class="categories-nav">
<?php foreach($links as $link): ?>
    <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['name']); ?></a></li>
<?php endforeach; ?>
</ul>
<?php
        endif;
    endif;
?>
</nav>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php endif; ?>
<?php if ( is_active_sidebar( 'shop_sidebar' ) ) :

    dynamic_sidebar( 'shop_sidebar' );

endif; ?>