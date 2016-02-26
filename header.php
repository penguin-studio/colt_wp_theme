<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
	$options = get_option( 'theme_settings' );
	?>
	<?php if(tf_variable_exist($options['favicon'])):?>
		<?php $favicon_url = wp_get_attachment_image_url( $options['favicon'], 'full' ); ?>
	<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo esc_url($favicon_url);?>">
	<?php endif;?>

	<!-- style start -->
	<?php
		$theme_path_uri = get_template_directory_uri()
	?>
	<link rel="stylesheet" href="<?php echo esc_url($theme_path_uri); ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo esc_url($theme_path_uri); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo esc_url($theme_path_uri); ?>/css/lightslider.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- style end -->
	<?php wp_head(); ?>
	<?php
		/**
		 * Хук предназначен для Google аналитики
		 */
		do_action('before_head_close');
	?>
</head>
<body>

	<?php
		/**
		 * Хук предназначен для Яндекс метрики
		 */
		do_action('before_head_close');
	?>
	<header class="header">
		<div class="container">
			<div class="header-nav-bar-left">
				<nav class="nav__social">
					<ul class="nav__social-list">
						<?php if(tf_variable_exist($options['social_vk_visible']) && $options['social_vk_visible'] == '1' &&
							$options['social_vk_url'] != ''):?>
							<li><a class="fa fa-vk" href="<?php echo esc_url($options['social_vk_url']);?>"></a></li>
						<?php endif; ?>
						<?php if(tf_variable_exist($options['social_facebook_visible']) && $options['social_facebook_visible'] == '1' &&
							$options['social_facebook_url'] != ''):?>
							<li><a class="fa fa-facebook" href="<?php echo esc_url($options['social_facebook_url']);?>"></a></li>
						<?php endif; ?>
						<?php if(tf_variable_exist($options['social_instagram_visible']) && $options['social_instagram_visible'] == '1' &&
							$options['social_instagram_url'] != ''):?>
							<li><a class="fa fa-instagram" href="<?php echo esc_url($options['social_instagram_url']);?>"></a></li>
						<?php endif; ?>
						<?php if(tf_variable_exist($options['social_twitter_visible']) && $options['social_twitter_visible'] == '1' &&
							$options['social_twitter_url'] != ''):?>
							<li><a class="fa fa-twitter" href="<?php echo esc_url($options['social_twitter_url']);?>"></a></li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
		<?php
		$logo_url = $theme_path_uri.'/img/default_logo.png';
		if(tf_variable_exist($options['logo_uri'])){
			$logo_url = wp_get_attachment_image_url($options['logo_uri'], 300, 300);
		}
		?>
		<div class="header-logo">
			<a href="<?php echo get_home_url(); ?>"><img src="<?php echo esc_url($logo_url);?>" height="222" width="222" alt="logo" title="<?php echo bloginfo('name')?>"></a>
		</div>
			<div class="header-nav-bar-right">

			</div>
		</div>
	</header>


