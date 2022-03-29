<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 ft-left">
				<div class="ft-logo">
					<?php echo get_custom_logo(); ?>
					<p>GenZRevise is powered by GenZNepal in order to provide the our honest review and opinion about the latest techs and gadgets available in the market. We also talk about the issues in the tech industry and how can we tackle those problems.</p>
				</div>
			</div>
			<div class="col-md-4 ft-middle">
				<h1>Contact Info</h1>
				<div class="address">
					<p>Adress:</p>
					<p>New Baneshwor, Kathmandu, Nepal</p>
				</div>
				<div class="mobile">
					<p>Mobile:</p>
					<p>+977 9845974686</p>
				</div>
				<div class="social">
					<p>Social Links:</p>
					<a href=""><img src="<?php echo get_template_directory_uri() ?>/src/img/Facebook.png" alt="" target="_blank"></a>
					<a href=""><img src="<?php echo get_template_directory_uri() ?>/src/img/Twitter.png" alt="" target="_blank"></a>
					<a href=""><img src="<?php echo get_template_directory_uri() ?>/src/img/Linkedin.png" alt="" target="_blank"></a>
				</div>
			</div>
			<div class="col-md-4 ft-right">
				<?php dynamic_sidebar('right-sidebar') ?>
			</div>
		</div>
	</div>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>