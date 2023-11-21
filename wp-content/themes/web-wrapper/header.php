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
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'web-wrapper'); ?></a>

		<header id="masthead" class="site-header">
			<nav class="navbar navbar-expand-lg navbar-dark ">
				<div class="container">
					<?php
					// Your custom logo code here if needed
					// Replace "Your Logo" with your actual logo or remove this part if you don't have a logo
					?>
					<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>

				
					<?php
					require_once get_template_directory() . '/bootstrap-navwalker.php';

					// WordPress Navigation Menu
					wp_nav_menu(array(
						'theme_location' => 'menu-1', // Replace with the name of your menu
						'container' => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id' => 'navbarNav',
						'menu_class' => 'navbar-nav ml-auto',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth' => 2,
						'walker' => new Bootstrap_NavWalker(),
					));
					?>
				</div>
			</nav>
		</header><!-- #masthead -->

		