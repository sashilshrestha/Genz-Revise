<?php

/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

// Gets Current URL
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
$current_url = substr($current_url, 7);
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<img src="<?php echo $thumb_url[0]; ?>" alt="" class="content-image">

	<div class="row">
		<div class="col-md-9">
			<div class="entry-content">

				<?php the_content(); ?>

				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
						'after'  => '</div>',
					)
				);
				?>

			</div><!-- .entry-content -->

		</div>
		<div class="col-md-3 side-container">
			<div class="share-box">
				<span>Share on: </span>
				<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F<?php echo $current_url; ?>%2F&amp;src=sdkpreparse"><img src="<?php echo get_template_directory_uri() ?>/src/img/Facebook.png" alt="" target="_blank"></a>
				<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2F<?php echo $current_url; ?>%2F&amp;ref_src=twsrc%5Etfw&amp;tw_p=tweetbutton&amp;url=https%3A%2F%2F<?php echo $current_url; ?>"><img src="<?php echo get_template_directory_uri() ?>/src/img/Twitter.png" alt="" target="_blank"></a>
				<a href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2F<?php echo $current_url; ?>"><img src="<?php echo get_template_directory_uri() ?>/src/img/Linkedin.png" alt="" target="_blank"></a>
			</div>
			<div class="side-title">
				<h3>Top Stories</h3>
			</div>
			<div class="side-posts">
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5,
					'order' => 'DESC',
					'orderby' => 'publish_date',
					'meta_query' => array(
						array(
							'key' => 'top_stories',
							'value' => '1',
							'compare' => '=',
							'type' => 'NUMERIC',
						),
					),
				);
				$allposts = new WP_Query($args);

				while ($allposts->have_posts()) :
					$allposts->the_post();

					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
				?>

					<div class="side-card">
						<div class="row">
							<div class="side-card__img col-md-4">
								<img src="<?php echo $thumb_url[0]; ?>" alt="">
							</div>
							<div class="side-card__info col-md-8">
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
								</a>
								<span class="topic">
									<?php
									$categories = get_the_terms($post->ID, 'category');

									foreach ($categories as $category) {
									?>
										<a href="<?php echo $category_link = get_category_link($category->term_id); ?>"><span><?php echo $category->name; ?></span></a>
									<?php
									}
									?>
								</span>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				$not_in_next_main[] = get_the_ID();
				wp_reset_postdata();
				?>
			</div>

			<div class="side-advertisement">
				<?php
				// Side Query
				$adsargs = array(
					'post_type' => 'sideads',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'order' => 'ASC',
					'orderby' => 'menu_order',
				);
				$sideposts = new WP_Query($adsargs);
				// # Side Query

				while ($sideposts->have_posts()) :
					$sideposts->the_post();

					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

				?>
					<img src="<?php echo $thumb_url[0] ?>" alt="">
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->
	<?php
	// if (comments_open()) :
	// 	comments_template();
	// endif;
	?>

</article><!-- #post-## -->