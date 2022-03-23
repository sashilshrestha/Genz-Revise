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