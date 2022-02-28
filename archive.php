<?php

/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
?>
<main id="categoryPage">
	<section class="category-header">
		<div class="container">
			<h1 class="category-title">
				<?php the_archive_title(); ?>
			</h1>
		</div>
		<div class="hd-overlay"></div>
		<?php
		$term = get_queried_object();
		$image = get_field('category_thumbnail', $term);
		?>
		<img src="<?php echo $image ?>" alt="">
	</section>

	<div class="wrapper" id="archive-wrapper">

		<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

			<div class="row">
				<main class="site-main" id="main">
					<?php
					if (have_posts()) {
					?>
						<section class="latest-news">
							<div class="container">
								<div class="row">
									<div class="col-md-9 main-container">
										<div class="news-container">
											<div class="small-news">
											<?php
											// Start the loop.
											while (have_posts()) {
												the_post();

												/*
											* Include the Post-Format-specific template for the content.
											* If you want to override this in a child theme, then include a file
											* called content-___.php (where ___ is the Post Format name) and that will be used instead.
											*/
												get_template_part('loop-templates/content', get_post_format());
											}
										} else {
											get_template_part('loop-templates/content', 'none');
										}
											?>
											<!-- ----- -->
											</div>
										</div>
									</div>
									<div class="col-md-3 side-container"></div>
								</div>
							</div>
						</section>
				</main><!-- #main -->

				<?php
				// Display the pagination component.
				// understrap_pagination();
				// Do the right sidebar check.
				// get_template_part('global-templates/right-sidebar-check');
				?>

			</div><!-- .row -->

		</div><!-- #content -->

	</div><!-- #archive-wrapper -->
</main>
<?php
get_footer();
