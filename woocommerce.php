<?php
/**
 * User: Максим Руденко
 * Date: 09.03.2016
 *
 */
?>
<?php get_header();?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="main-blocks col-md-12">
                <aside class="col-md-3">
                    <?php get_sidebar('shop');?>
                </aside>
                <section class="col-md-9">
                    <?php /* The loop */ ?>
                    <?php woocommerce_content(); ?>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>
