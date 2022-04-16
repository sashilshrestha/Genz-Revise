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
				<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F<?php echo $current_url; ?>&amp;src=sdkpreparse"><img src="<?php echo get_template_directory_uri() ?>/src/img/Facebook.png" alt="" target="_blank"></a>
				<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2F<?php echo $current_url; ?>&amp;ref_src=twsrc%5Etfw&amp;tw_p=tweetbutton&amp;url=https%3A%2F%2F<?php echo $current_url; ?>"><img src="<?php echo get_template_directory_uri() ?>/src/img/Twitter.png" alt="" target="_blank"></a>
				<a href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F<?php echo $current_url; ?>"><img src="<?php echo get_template_directory_uri() ?>/src/img/Linkedin.png" alt="" target="_blank"></a>
			</div>
			<?php
			include("wp-content/themes/Genz-Revise/page-templates/side-container-gz.php")
			?>
		</div>
	</div>

	<?php
	// if (comments_open()) :
	// 	comments_template();
	// endif;
	?>

</article><!-- #post-## -->