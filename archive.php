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
					<section class="latest-news">
						<div class="container">
							<div class="row">
								<div class="col-md-9 main-container">
									<div class="news-container">
										<div class="small-news">
											<?php
											$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

											$category = get_queried_object();
											$postcat = $category->term_id;

											$args = array(
												'post_type' => 'post',
												'posts_per_page' => 2,
												'order' => 'DESC',
												'post_status' => 'publish',
												'orderby' => 'publish_date',
												'cat' => $postcat,
												'paged' => $paged,

											);
											$categoryposts = new WP_Query($args);
											// $categoryposts = query_posts($args);

											// Start the loop.
											while ($categoryposts->have_posts()) :
												$categoryposts->the_post();

												// For image url
												$thumb_id = get_post_thumbnail_id();
												$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

												$ispage = (get_query_var('paged')) ? get_query_var('paged') : 1;
												if ($ispage == 1) {

													echo 'Page 1';
											?>
													<div class="news-card">
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
																<a href="<?php the_permalink(); ?>">
																	<h1><?php the_title(); ?></h1>
																</a>
															</div>
															<p class="desc">
																<?php echo  get_excerpt_trim(16, ' ...') ?>
															</p>
															<div class="pub-date"><?php echo get_the_date() ?></div>
														</div>
													</div>
											<?php
												} else {
													echo 'Second Page';
												}
											endwhile;

											?>

											<?php
											function pagination($query)
											{ ?>
												<ul class="pagination">
													<?php
													$pages = paginate_links(array(
														'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
														'total'        => $query->max_num_pages,
														'current'      => max(1, get_query_var('paged')),
														'format'       => '?paged=%#%',
														'show_all'     => false,
														'type'         => 'array',
														'end_size'     => 2,
														'mid_size'     => 1,
														'prev_next'    => true,
														'prev_text'    => '<span class ="fa fa-caret-left" aria-hidden="true"></span><span class="prev-text">Prev</span>',
														'next_text'    => '<span class="next-text">Next</span> <span class ="fa fa-caret-right" aria-hidden="true"></span>',
														'add_args'     => false,
														'add_fragment' => '',
													));

													if (is_array($pages)) :
														foreach ($pages as $p) : ?>
															<li class="pagination-item js-ajax-link-wrap">
																<?php echo $p; ?>
															</li>
													<?php endforeach;
													endif; ?>
												</ul>
											<?php
											}
											pagination($categoryposts);

											pp_pagination_nav();
											wp_reset_postdata();
											?>


										</div>
									</div>
								</div>
								<div class="col-md-3 side-container">
									<?php
									include("wp-content/themes/Genz-Revise/page-templates/side-container-gz.php")
									?>
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
// }
get_footer();
