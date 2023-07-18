<?php

add_filter('upload_mimes', function ($mime_types) {
	$mime_types['svg'] = 'image/svg+xml';
	$mime_types['webp'] = 'image/webp';
	return $mime_types;
}, 1, 1);


add_action('login_enqueue_scripts', function () { ?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url('<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]; ?>');
			padding-bottom: 30px;
			width: auto;
			background-size: contain;
		}
	</style>
<?php
});

show_admin_bar(false);

add_action('after_setup_theme', function () {

	if (get_option('is_setup', '0') == '1') {
		return;
	}

	$args = [
		'post_title' => 'Homepage',
		'post_status' => 'publish',
		'post_type' => 'page'
	];
	$hp = wp_insert_post($args);

	if ($hp) {
		update_option('page_on_front', $hp);
		update_option('show_on_front', 'page');
	}

	update_option('is_setup', '1');
});


add_action('init', function () {
	if (isset($_GET['post'])) {
		$id = $_GET['post'];
		switch ($id) {
			case get_option('page_on_front'):
				remove_post_type_support('page', 'editor');
				break;
			default:
				break;
		}
	}
});


add_filter('nav_menu_css_class', function ($classes, $item, $args) {
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}, 1, 3);

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
	if (isset($args->add_link_class)) {
		$atts['class'] = $args->add_link_class;
	}
	return $atts;
}, 10, 3);

add_filter(
	'acf/settings/save_json',
	function ($path) {

		// update path
		$path = get_template_directory() . '/include/acf';
		if (!file_exists($path)) {
			mkdir($path);
		}

		return $path;
	}
);


add_filter('acf/settings/load_json', function ($paths) {

	// remove original path (optional)
	unset($paths[0]);

	$paths[] = get_template_directory() . '/include/acf';

	return $paths;
});

function asset_url($path = '')
{
	$base = is_child_theme() ? get_stylesheet_directory_uri() : get_template_directory_uri();
	return $base . '/dist' . ($path[0] == '/' ? $path : '/' . $path);
}
