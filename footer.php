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
				This is center
			</div>
			<div class="col-md-4 ft-right">
				This is right
			</div>
		</div>
	</div>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>