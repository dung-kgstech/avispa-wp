<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="site-header">

		<!-- Header Top -->
		<div class="header-top">
			<div class="header-container">

				<!-- Logo -->
				<div class="logo-area">
					<a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo/logo-avispa.webp" alt="logo-avispa">
					</a>

					<a href="#" class="logo1">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo/logo-NAYBee.webp" alt="logo-NAYBee">
					</a>
				</div>


				<!-- Header Actions -->
				<div class="header-right">

					<a href="#" class="icon-btn">
						<img src="<?php echo get_template_directory_uri(); ?>/images/calendar.webp" alt="calendar">
					</a>

					<a href="#" class="icon-btn">
						<img src="<?php echo get_template_directory_uri(); ?>/images/shop.webp" alt="shop">
					</a>

					<a href="#" class="icon-btn">
						<img src="<?php echo get_template_directory_uri(); ?>/images/account.webp" alt="ticket">
					</a>

					<a href="#" class="mobile-partner-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo/logo-NAYBee.webp" alt="TEAM NAYBEE">
					</a>

					<button class="mobile-menu-toggle" type="button" aria-label="メニューを開く" aria-expanded="false">
						<span></span><span></span><span></span>
					</button>

				</div>

			</div>
		</div>

		<div class="main-logo">
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo/logo_main.webp" alt="logo_main">
			</a>
		</div>


		<!-- Header Bottom -->
		<div class="header-bottom">
			<nav class="main-nav">
				<ul class="ul_left">
					<li class="menu-ticket"><a href="#" data-mobile-label="チケット">TICKET</a></li>
					<li class="menu-match"><a href="<?php echo esc_url(home_url('/match')); ?>" data-mobile-label="試合・練習">MATCH</a></li>
					<li class="menu-team"><a href="<?php echo esc_url(home_url('/team')); ?>" data-mobile-label="選手・クラブ">TEAM</a></li>
					<li class="menu-home"><a href="#" data-mobile-label="ホーム">HOME</a></li>
					<li class="menu-news"><a href="#" data-mobile-label="ニュース">NEWS</a></li>
				</ul>
				<ul class="ul_right">
					<li class="menu-fan"><a href="#" data-mobile-label="ファン">FAN</a></li>
					<li class="menu-academy"><a href="#" data-mobile-label="アカデミー">ACADEMY</a></li>
					<li class="menu-support"><a href="#" data-mobile-label="サポート">SUPPORT</a></li>
					<li class="menu-partner"><a href="#" data-mobile-label="パートナー">PARTNER</a></li>
				</ul>
			</nav>
			<div class="mobile-nav-scrollbar" aria-hidden="true">
				<span class="mobile-nav-scrollbar-thumb"></span>
			</div>

		</div>

	</header>