<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, height=device-height">
			<?php
			$options = get_option( 'theme_settings' );
			?>
			<?php if($options['favicon']):?>
				<?php
				$favicon_attributes = wp_get_attachment_image_src( $options['favicon'], 'full' );
				$favicon_src = $favicon_attributes[0];
				?>
				<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $favicon_src;?>">
			<?php endif;?>
			<!-- style start -->
			<!-- style end -->

	<?php wp_head(); ?>


</head>

<body>
