<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web-wrapper
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-W07ECJTWFH"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-W07ECJTWFH');
	</script>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . '/img/apple-touch-icon.png' ?>">
	<link rel=" icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . '/img/favicon-32x32.png' ?>">
	<link rel=" icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . '/img/favicon-16x16.png' ?>">
	<link rel=" manifest" href="<?php echo get_template_directory_uri() . '/img/site.webmanifest' ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id=" page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'web-wrapper'); ?></a>

		<!-- <header id="masthead" class="site-header">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<?php
					// Your custom logo code here if needed
					// Replace "Your Logo" with your actual logo or remove this part if you don't have a logo
					?>
					<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>

					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
					require_once get_template_directory() . '/bootstrap-navwalker.php';

					// WordPress Navigation Menu
					wp_nav_menu(array(
						'theme_location' => 'menu-1', // Replace with the name of your menu
						'container' => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id' => 'navbarNav',
						'menu_class' => 'navbar-nav ms-auto',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth' => 2,
						'walker' => new Bootstrap_NavWalker(),
					));
					?>
				</div>
			</nav>
		</header>#masthead -->
		<header>
			<div class="container">
				<div class="d-flex align-items-center justify-content-between">
					<a href="/" class="brand">Web-wrapper</a>
					<!-- Button to toggle mobile menu -->
					<button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>Menu
					</button>
					<!-- Mobile menu content -->
					<div class="collapse mobile-menu" id="mobileMenu">
						<div class="top-nav d-flex justify-content-between align-items-start">
							<ul class="d-flex flex-column gap-4">
								<li><a class="display-4" href="/about"> About</a></li>
								<li><a class="display-4" href="/services"> Services</a></li>
								<li><a class="display-4" href="/portfolio"> Portfolio</a></li>
								<li><a class="display-4" href="/contact"> Contact</a></li>
								<li><a class="display-4" href="/blogs"> Blogs</a></li>
							</ul>
							<button class="btn-primary close-btn">Close</button>
						</div>
						<div class="bottom-nav d-flex flex-column">
							<a href="mailto:info@web-wrapper.com" class="text-decoration-none">
								<h6 class="">E: info@web-wrapper.com</h6>
							</a>
							<a href="tel:+14379245244" class="text-decoration-none">
								<h6 class="">T: +1 (437) - 924 - 5244</h6>
							</a>
						</div>
					</div>
					<!-- End of mobile menu content -->
					<!-- Desktop menu -->
					<ul class="d-none d-md-flex">
						<li><a href="/about"> About</a></li>
						<li><a href="/services"> Services</a></li>
						<li><a href="/portfolio"> Portfolio</a></li>
						<li><a href="/contact"> Contact</a></li>
						<li><a href="/blogs"> Blogs</a></li>
					</ul>
					<!-- End of desktop menu -->
				</div>
			</div>
		</header>

		<!-- Overlay -->
		<div class="overlay"></div>


		<!-- Overlay -->
		<div class="overlay"></div>