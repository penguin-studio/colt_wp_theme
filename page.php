<?php get_header();?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="main-blocks col-md-12">

<?php if ( have_posts() ) : ?>
<?php
	while ( have_posts() ) : the_post();
?>
				<h2 class="main-blocks__title"><?php the_title();?></h2>
				<div class="post-container">
			<?php
				/* translators: %s: Name of current post */
				the_content();
			?>
				</div>
<?php
	endwhile;
endif;
?>
			</div>
		</div>
	</div>
</div>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>
