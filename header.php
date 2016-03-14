<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
			global $wp_query;
			global $post;
			global $options;
			$options = tf_variable_exist(get_option( 'theme_settings' ));


	?>
	<?php if(tf_variable_exist($options['favicon'])):?>
		<?php $favicon_url = wp_get_attachment_image_url( $options['favicon'], 'full' ); ?>
	<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo esc_url($favicon_url);?>">
	<?php endif;?>

	<!-- style start -->
	<?php
		$theme_path_uri = get_template_directory_uri();
	?>
	<link rel="stylesheet" href="<?php echo esc_url($theme_path_uri); ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo esc_url($theme_path_uri); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo esc_url($theme_path_uri); ?>/css/lightslider.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- style end -->
	<script src="<?php echo esc_url($theme_path_uri); ?>/js/jquery.min.js"></script>
	<script src="<?php echo esc_url($theme_path_uri); ?>/js/lightslider.js"></script>

	
	<?php wp_head(); ?>
	<?php
		/**
		 * Хук предназначен для Google аналитики
		 */
		do_action('before_head_close');
	?>
	<!--GoogleAnalyticsObject-->
	<script>
               (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
               (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
               m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
               })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

               ga('create', 'UA-74992501-1', 'auto');
               ga('send', 'pageview');

     </script>
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
			<div class="header-nav-bar-left hidden-xs">
                <div class="search__form">
					<?php get_search_form(); ?>
				</div>
				<nav class="nav__social">

					<ul class="nav__social-list" style="display: inline-block;">

						<?php
						 $social_vk_visible = isset($options['social_vk_visible'])?$options['social_vk_visible']:'';
						 $social_vk_url = isset($options['social_vk_url'])?$options['social_vk_url']:'';
						$social_facebook_visible = isset($options['social_facebook_visible'])?$options['social_facebook_visible']:'';
						$social_facebook_url = isset($options['social_facebook_url'])?$options['social_facebook_url']:'';
						$social_instagram_visible = isset($options['social_instagram_visible'])?$options['social_instagram_visible']:'';
						$social_instagram_url = isset($options['social_instagram_url'])?$options['social_instagram_url']:'';
						$social_twitter_visible = isset($options['social_twitter_visible'])?$options['social_twitter_visible']:'';
						$social_twitter_url = isset($options['social_twitter_url'])?$options['social_twitter_url']:'';
						$social_youtube_url = isset($options['social_youtube_url'])?$options['social_youtube_url']:'';
						$social_youtube_visible = isset($options['social_youtube_visible'])?$options['social_youtube_visible']:'';
						$social_pinterest_url = isset($options['social_pinterest_url'])?$options['social_pinterest_url']:'';
						$social_pinterest_visible = isset($options['social_pinterest_visible'])?$options['social_pinterest_visible']:'';
						$social_periscope_url = isset($options['social_periscope_url'])?$options['social_periscope_url']:'';
						$social_periscope_visible = isset($options['social_periscope_visible'])?$options['social_periscope_visible']:'';
						?>

						<?php if($social_vk_visible && $social_vk_visible == '1' &&
							$social_vk_url != ''):?>
							<li><a class="fa fa-vk" href="<?php echo esc_url($social_vk_url);?>"></a></li>
						<?php endif; ?>
						<?php if($social_facebook_visible && $social_facebook_visible == '1' &&
							$social_facebook_url != ''):?>
							<li><a class="fa fa-facebook" href="<?php echo esc_url($social_facebook_url);?>"></a></li>
						<?php endif; ?>
						<?php if($social_instagram_visible && $social_instagram_visible == '1' &&
							$social_instagram_url != ''):?>
							<li><a class="fa fa-instagram" href="<?php echo esc_url($social_instagram_url);?>"></a></li>
						<?php endif; ?>
						<?php if( $social_twitter_visible && $social_twitter_visible == '1' &&
							$social_twitter_url != ''):?>
							<li><a class="fa fa-twitter" href="<?php echo esc_url($social_twitter_url);?>"></a></li>
						<?php endif; ?>
						<?php if( $social_youtube_visible && $social_youtube_visible == '1' &&
							$social_youtube_url != ''):?>
							<li><a class="fa fa-youtube" href="<?php echo esc_url($social_youtube_url);?>"></a></li>
						<?php endif; ?>
						<?php if( $social_pinterest_visible && $social_pinterest_visible == '1' &&
							$social_pinterest_url != ''):?>
							<li><a class="fa fa-pinterest" href="<?php echo esc_url($social_pinterest_url);?>"></a></li>
						<?php endif; ?>
						<?php if( $social_periscope_visible && $social_periscope_visible == '1' &&
							$social_periscope_url != ''):?>
							<li><a class="icon-periscope-2" href="<?php echo esc_url($social_periscope_url);?>"></a></li>
						<?php endif; ?>
					</ul>
				</nav>
				<nav class="header-nav__left">
					<ul class="header-nav">
						<?php if($options['menu_left_side']): ?>
							<?php
							$menu_items = wp_get_nav_menu_items($options['menu_left_side']);
							$current_page_url = get_permalink();

							if($menu_items):
								foreach ($menu_items as $item):
									$active = "";
									if(strcmp($item->url,$current_page_url ) == 0){
										$active = 'class="active"';
									}
									?>
									<li>
										<a <?php echo $active; ?> href="<?php echo esc_url($item->url); ?>"><?php echo esc_html($item->title); ?></a>
									</li>
								<?php endforeach;	?>
								<?php
							endif;
						endif;
						?>
					</ul>
				</nav>
			</div>
		<?php
		$logo_url = $theme_path_uri.'/img/default_logo.png';
		$logo_uri = isset($options['logo_uri'])?$options['logo_uri']:'';

		if($logo_uri){
			$logo_url = wp_get_attachment_image_url($logo_uri, 300, 300);
		}
		?>
		<div class="header-logo  hidden-xs">
			<a href="<?php echo get_home_url(); ?>"><img src="<?php echo esc_url($logo_url);?>" height="222" width="222" alt="logo" title="<?php echo bloginfo('name')?>"></a>
		</div>
			<div class="header-nav-bar-right  hidden-xs">
				<?php if(tf_variable_exist($options['contacts_schedule'])):?>
				<p class="schedule"><?php echo esc_html($options['contacts_schedule']); ?></p>
				<?php endif; ?>
				<a class="header-check ms_booking" data-url="https://yclients.com/booking/34027/2/1" href="#">Запись онлайн</a>
				<nav class="header-nav__right">
					<ul class="header-nav">
						<?php if($options['menu_left_side']): ?>
							<?php
							$menu_items = wp_get_nav_menu_items($options['menu_right_side']);
							$current_page_url = get_permalink();

							if($menu_items):
								foreach ($menu_items as $item):
									$active = "";
									if(strcmp($item->url,$current_page_url ) == 0){
										$active = 'class="active"';
									}
									?>
									<li>
										<a <?php echo $active; ?> href="<?php echo esc_url($item->url); ?>"><?php echo esc_html($item->title); ?></a>
									</li>
								<?php endforeach;	?>
								<?php
							endif;
						endif;
						?>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div class="responsive__menu">
	<div class="container">
        <!--responsive menu-->
        <nav class="header-nav hidden-md hidden-lg visible-xs">
            <input type="checkbox" id="hmt" class="hidden-menu-ticker">
            <label class="btn-menu" for="hmt">
                <span class="first"></span>
                <span class="second"></span>
                <span class="third"></span>
            </label>
            <ul class="hidden-menu">
                <?php if($options['menu_left_side']): ?>
                    <?php
                    $menu_items = wp_get_nav_menu_items($options['menu_left_side']);
                    $current_page_url = get_permalink();

                    if($menu_items):
                        foreach ($menu_items as $item):
                            $active = "";
                            if(strcmp($item->url,$current_page_url ) == 0){
                                $active = 'class="active"';
                            }
                            ?>
                            <li>
                                <a <?php echo $active; ?> href="<?php echo esc_url($item->url); ?>"><?php echo esc_html($item->title); ?></a>
                            </li>
                        <?php endforeach;	?>
                        <?php
                    endif;
                endif;
                ?>
                <?php if($options['menu_left_side']): ?>
                    <?php
                    $menu_items = wp_get_nav_menu_items($options['menu_right_side']);
                    $current_page_url = get_permalink();

                    if($menu_items):
                        foreach ($menu_items as $item):
                            $active = "";
                            if(strcmp($item->url,$current_page_url ) == 0){
                                $active = 'class="active"';
                            }
                            ?>
                            <li>
                                <a <?php echo $active; ?> href="<?php echo esc_url($item->url); ?>"><?php echo esc_html($item->title); ?></a>
                            </li>
                        <?php endforeach;	?>
                        <?php
                    endif;
                endif;
                ?>
            </ul>
        </nav>
    </div>
    </div>

	<?php if(is_front_page()): ?>
		<section class="slider">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->

				<?php
					if(function_exists('slider_view')){
						$args =array(
							'before_img' => '<div class="item">',
							'after_img' => '</div>',
							'container_start' => '<div class="carousel-inner" role="listbox">',
							'container_end' => '</div>',
							'slider_slug' => 'slajder-glavnoj-stranicy'
						);
						echo slider_view($args);
					}
				?>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<a href="#about_us" class="go-to-down"><span class="go-to-down__nav glyphicon glyphicon-menu-down"></span></a>
		</section>
	<?php endif; ?>
	<section class="main">
		<div class="container ">

			<?php if(!is_front_page() && ($post->post_type != 'product')): ?>
				<div class="breadcrumb" style="background-color: #dfdfe2;">
				<?php echo breadcrumbs(' » '); ?>
				</div>
			<?php endif; ?>

			<?php if($post->post_type == 'product'): ?>
				<div class="breadcrumb" style="background-color: #dfdfe2;">
				<?php
				$args = array(
					'delimiter'   => '»'
				);
					echo woocommerce_breadcrumb($args);
				?>
				</div>
			<?php endif; ?>

		</div>