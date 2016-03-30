<?php
/*
Template Name: Шаблон главной страницы
*/
?>
<?php get_header();?>
<?php
    get_template_part('content/main_page/about_us');
?>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php
get_template_part('content/main_page/barber');
?>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php
get_template_part('content/main_page/tattoo');
?>
<div class="hidden-sm hidden-xs separator-line"></div>
  <?php
  get_template_part('content/main_page/services');
?>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php
get_template_part('content/main_page/video');
?>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php
get_template_part('content/main_page/maps');
?>
<?php get_footer(); ?>
