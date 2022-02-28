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

// Removing Category Keyword
function prefix_category_title($title)
{
	if (is_category()) {
		$title = single_cat_title('', false);
	}
	return $title;
}
add_filter('get_the_archive_title', 'prefix_category_title');


//Featured Image in Category Section
function addTitleFieldToCat()
{
	$cat_title = get_term_meta($_POST['tag_ID'], '_pagetitle', true);
?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="cat_page_title"><?php _e('Category Page Title'); ?></label></th>
		<td>
			<input type="text" name="cat_title" id="cat_title" value="<?php echo $cat_title ?>"><br />
			<span class="description"><?php _e('Title for the Category '); ?></span>
		</td>
	</tr>
<?php

}
add_action('edit_category_form_fields', 'addTitleFieldToCat');

function saveCategoryFields()
{
	if (isset($_POST['cat_title'])) {
		update_term_meta($_POST['tag_ID'], '_pagetitle', $_POST['cat_title']);
	}
}
add_action('edited_category', 'saveCategoryFields');
