<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<?php if (is_home() || is_front_page()) : ?>
		<title>Avispa</title>

	<?php else : ?>
		<title><?php echo trim(wp_title('', false)); ?> | Avispa</title>
	<?php endif; ?>

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<!-- <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico"> -->

	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style_pc.css?_<?php microtime(); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style_mobile.css?_<?php microtime(); ?>">

	<script src="<?php echo get_template_directory_uri(); ?>/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/common.js"></script>
</head>

<body>
	<header class="site-header">

		<!-- Header Top -->
		<div class="header-top">
			<div class="header-container">

				<!-- Logo -->
				<div class="logo-area">
					<a href="#" class="logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo-avispa.webp" alt="logo-avispa">
					</a>

					<div href="#" class="logo1">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo-NAYBee.webp" alt="logo-NAYBee">
					</div>
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
						<img src="<?php echo get_template_directory_uri(); ?>/images/account.webp" alt="account">
					</a>

				</div>

			</div>
		</div>

		<div class="main-logo">
			<a href="#">
				<img src="<?= get_template_directory_uri(); ?>/images/logo_main.webp" alt="logo_main">
			</a>
		</div>


		<!-- Header Bottom -->
		<div class="header-bottom">
			<nav class="main-nav">
				<ul class="ul_left">
					<li><a href="#">HOME</a></li>
					<li><a href="#">NEWS</a></li>
					<li><a href="#">MATCH</a></li>
					<li><a href="#">TEAM</a></li>
					<li><a href="#">TICKET</a></li>
				</ul>
				<ul class="ul_right">
					<li><a href="#">FAN</a></li>
					<li><a href="#">ACADEMY</a></li>
					<li><a href="#">PARTNER</a></li>
					<li><a href="#">SUPPORT</a></li>
				</ul>
			</nav>

		</div>

	</header>