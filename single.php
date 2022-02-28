<?php

/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<header class="single-header">
	<div class="container">
		<div class="row">
			<?php the_title('<h1 class="single-title">', '</h1>'); ?>
			<div class="single-meta">
				<?php echo get_the_date() ?>
			</div><!-- .entry-meta -->
		</div>
	</div>
</header><!-- .entry-header -->

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php //get_template_part('global-templates/left-sidebar-check'); 
			?>

			<main class="site-main" id="main">

				<?php
				while (have_posts()) {
					the_post();
					get_template_part('loop-templates/content', 'single');
					// understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					// if (comments_open() || get_comments_number()) {
					// 	comments_template();
					// }
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php //get_template_part('global-templates/right-sidebar-check'); 
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
