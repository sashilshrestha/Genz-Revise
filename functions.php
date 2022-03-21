<?php

/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ($understrap_includes as $file) {
	require_once get_theme_file_path($understrap_inc_dir . $file);
}

/*************************************************** New Addition For Genz Revise Theme ***************************************************/

// ----------------------------- Removing Category Keyword -----------------------------
function prefix_category_title($title)
{
	if (is_category()) {
		$title = single_cat_title('', false);
	}
	return $title;
}
add_filter('get_the_archive_title', 'prefix_category_title');

// ----------------------------- Pagination starts here -----------------------------
function pp_pagination_nav()
{

	if (is_singular())
		return;

	global $wp_query;

	/** Stops execution if there's only 1 page */
	if ($wp_query->max_num_pages <= 1)
		return;

	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$max = intval($wp_query->max_num_pages);

	/** Adds current page to the array */
	if ($paged >= 1)
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination-container"><ul class="pagination">' . "\n";

	/** Previous Post Link Function */
	if (get_previous_posts_link())
		printf('<li>%s</li>' . "\n", get_previous_posts_link());

	/** Links to the first page, plus ellipses if necessary */
	if (!in_array(1, $links)) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

		if (!in_array(2, $links))
			echo '<li>…</li>';
	}

	/** Links to current page, plus 2 pages in either direction if necessary */
	sort($links);
	foreach ((array) $links as $link) {
		$class = $paged == $link ? ' class="active"' : '';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
	}

	/** Links to last page, plus ellipses if necessary */
	if (!in_array($max, $links)) {
		if (!in_array($max - 1, $links))
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
	}

	/** Next Post Link function */
	if (get_next_posts_link())
		printf('<li>%s</li>' . "\n", get_next_posts_link());

	echo '</ul></div>' . "\n";
}

// older post class added
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes()
{
	return 'class="switcher-pages"';
}

// add_action('template_redirect', 'redirect_to_other_page');
// function redirect_to_other_page()
// {
// 	if (is_page(143)) {

// 		wp_redirect('"' . home_url() . '/services/messenger/"', 301);
// 		///wp_redirect( 'example.com/page', 301 ); 
// 		exit;
// 	}
// }


// ----------------------------- Feature image in admin pannel -----------------------------
// show featured images in dashboard
add_image_size('genz-admin-post-featured-image', 100, 120, false);

// Add the posts and pages columns filter. They both use the same function.
add_filter('manage_posts_columns', 'genz_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'genz_add_post_admin_thumbnail_column', 2);

// Add the column
function genz_add_post_admin_thumbnail_column($genz_columns)
{
	$genz_columns['genz_thumb'] = __('Featured Image');
	return $genz_columns;
}

// Manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'genz_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'genz_show_post_thumbnail_column', 5, 2);

// Get featured-thumbnail size post thumbnail and display it
function genz_show_post_thumbnail_column($genz_columns, $genz_id)
{
	switch ($genz_columns) {
		case 'genz_thumb':
			if (function_exists('the_post_thumbnail')) {
				echo the_post_thumbnail('genz-admin-post-featured-image');
			} else
				echo 'hmm… your theme doesn\'t support featured image…';
			break;
	}
}

// ----------------------------- Custom Excerpt  -----------------------------
function get_excerpt_trim($num_words, $more)
{
	$excerpt = get_the_content();
	$excerpt = wp_trim_words($excerpt, $num_words, $more);
	return $excerpt;
}

// ----------------------------- Custom Wide Ads post type -----------------------------
function gr_custom_wide_ads()
{
	register_post_type('Wide Ads', [
		'rewrite' => ['slug' => 'wide_ads'],
		'labels' => [
			'name' => 'Wide Ads',
			'singular_name' => 'Wide Ad',
			'add_new_item' => 'Add Wide Ad',
			'edit_item' => 'Edit Wide Ad',
		],
		'menu_icon' => 'dashicons-media-text',
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_position' => 4,
		'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
	]);
}
add_action('init', 'gr_custom_wide_ads');
