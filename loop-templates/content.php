<?php

/**
 * Post rendering content according to caller of get_template_part
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
?>

<div class="news-card" id="post-<?php the_ID(); ?>">
	<img src="<?php echo $thumb_url[0] ?>" alt="">
	<div class="news-info">
		<div class="topic"><span>Games</span></div>
		<div class="title">
			<h1><?php the_title(); ?></h1>
		</div>
		<p class="desc">
			Pros Durable build Decent display Huge Battery Good software optimization Cons Average camera Average performance…
		</p>
		<div class="pub-date"><?php understrap_posted_on(); ?></div>
	</div>
</div>