<?php
/**
 * User: Максим Руденко
 * Date: 02.03.2016
 * Вывод страницы барбер мастера
 */
?>
<?php get_header();?>
<?php if ( have_posts() ) : ?>
    <?php
    while ( have_posts() ) : the_post();
        ?>
        <?php get_template_part('content/single/master'); ?>
        <?php
    endwhile;
endif;
?>
    <div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>