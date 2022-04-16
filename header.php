<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>

			<nav id="main-nav" aria-labelledby="main-nav-label">
				<div class="container">

					<?php echo get_custom_logo(); ?>

					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'nav-links',
							'fallback_cb'     => '',
							'menu_id'         => '',
							'depth'           => 2,
							// 'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
					<div class="ham-burger">
						<img src="./img/Cart.svg" alt="" class="cart-icon" />

						<div class="all-lines">
							<div class="line line1"></div>
							<div class="line line2"></div>
							<div class="line line3"></div>
						</div>
					</div>
					<div class="blur-bg"></div>

				</div><!-- .container -->


			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->