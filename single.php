<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
?>
		<?php the_title();?>
			<?php the_content(); ?>
<?php
	endwhile;
endif;
?>
<?php get_footer(); ?>
