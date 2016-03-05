<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<style>
	.main-404{
		background-color: #dfdfe2;
		display: flex;
		width: 100%;
		flex-direction: row;
	}
	.main-404 >div {
		margin: auto;
	}
	.main-404 h1 {
		font-family: 'Condiment', cursive;
		margin-top: 20px;
		color: #EA3C4D;
		font-size: 2.4em;
		text-transform: capitalize;
		font-weight: bold;
	}
	.text{
		padding-left: 5%;
		padding-right: 5%;
	}
</style>
<div class="container">
		<div class="main-404">
			<div class="text">
				<h1>Запрашиваемая страница не найдена! ....</h1>
				<p>Извините! Очевидно, что документ, который вы искали был перемещен или больше не существуют ...</p>
			</div>
			<div class="banner">
				<img src="<?php echo get_template_directory_uri(); ?>/img/banner.png" alt="" />
			</div>
			<div style="clear:both;"></div>
		</div>
</div>
<div class="hidden-sm hidden-xs separator-line"></div>
<?php get_footer(); ?>
