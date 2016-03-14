<?php
/**
 * User: Максим Руденко
 * Date: 10.03.2016
 * Сайдбар магазина
 */
?>
<div>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'shop_sidebar' ) ) :

        dynamic_sidebar( 'shop_sidebar' );

    endif; ?>
</div>
