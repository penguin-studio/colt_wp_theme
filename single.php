<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php
	while ( have_posts() ) : the_post();
?>
		<?php get_template_part('content/single/blog'); ?>
<?php
	endwhile;
endif;
?>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>
