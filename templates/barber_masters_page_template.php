<?php
/*
Template Name: Шаблон страницы барбер мастеров
*/
/**
 * User: Эзиз
 * Date: 01.03.2016
 * Файл отвечает за вывод страницы барбер мастеров
 */
?>
<?php get_header();?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks col-md-12">
                <h2 class="main-blocks__title">Барбер мастера:</h2>
                <div class="row">
                    <?php get_template_part('content/loop/barber_master_page'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>
