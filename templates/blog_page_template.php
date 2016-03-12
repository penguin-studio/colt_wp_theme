<?php
/*
Template Name: Шаблон страницы блога
*/
/**
 * User: Максим Руденко
 * Date: 02.03.2016
 * Файл отвечает за вывод шаблона блога
 */
?>
<?php get_header();?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks col-md-12">
                <h2 class="main-blocks__title">Блог:</h2>
                <?php get_template_part('content/loop/blog_page'); ?>
            </div>
        </div>
    </div>
</div>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>
