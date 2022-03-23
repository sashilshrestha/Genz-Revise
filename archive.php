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
		<img src="<?php echo $image ?>" alt="" class="demo">
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
												$category = get_queried_object();
												$postcat = $category->term_id;

												$args = array(
													'posts_per_page' => 10,
													'order' => 'DESC',
													'post_status' => 'publish',
													'orderby' => 'publish_date',
													'paged' => $paged,
													'cat' => $postcat
												);
												$categoryposts = new WP_Query($args);

												// Start the loop.
												while ($categoryposts->have_posts()) :
													$categoryposts->the_post();

													// For image url
													$thumb_id = get_post_thumbnail_id();
													$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

												?>
													<div class="news-card" id="post-<?php the_ID(); ?>">
														<img src="<?php echo $thumb_url[0] ?>" alt="">
														<div class="news-info">
															<div class="topic">
																<?php
																$categories = get_the_terms($post->ID, 'category');
																foreach ($categories as $category) {
																?>
																	<a href="<?php echo $category_link = get_category_link($category->term_id); ?>"><span><?php echo $category->name; ?></span></a>
																<?php
																}
																?>
															</div>
															<div class="title">
																<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
															</div>
															<p class="desc">
																Pros Durable build Decent display Huge Battery Good software optimization Cons Average camera Average performance…
															</p>
															<div class="pub-date"><?php understrap_posted_on(); ?></div>
														</div>
													</div>
											<?php
												endwhile;
												pp_pagination_nav();
												wp_reset_postdata();
											} else {
												get_template_part('loop-templates/content', 'none');
											}
											?>

											<!-- ----- -->
											</div>
										</div>
									</div>
									<div class="col-md-3 side-container">
										<?php echo get_sidebar(); ?>
									</div>
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
