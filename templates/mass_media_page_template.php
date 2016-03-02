<?php
/*
Template Name: Шаблон страницы ЗМІ про нас
*/
/**
 * User: Максим Руденко
 * Date: 02.03.2016
 *
 */
?>
<?php get_header();?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks col-md-12">
                <h2 class="main-blocks__title">ЗМІ про нас</h2>
                <div class="row">
                    <?php get_template_part('content/loop/mass_media_page'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>
