<?php

require_once get_template_directory() . '/include/setup.php';
require_once get_template_directory() . '/plugin-update-checker/plugin-update-checker.php';

// $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// 	'GIT_REPO_URL',
// 	__FILE__,
// 	'DOMAIN'
// );

//Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('bYXVyduy_B8pZ3y_c8A8');


add_action('after_setup_theme', function () {

	load_theme_textdomain('theme');

	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');
	add_post_type_support('post', 'excerpt');

	register_nav_menus(array(
		'main'    => 'Main Menu',
		'footer'    => 'Footer Menu'
	));
});


add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('tailwind', asset_url('css/tailwind.css'), array(), wp_get_theme()->get('Version'));
	wp_enqueue_style('app', asset_url('css/app.css'), array('tailwind'), wp_get_theme()->get('Version'));

	wp_enqueue_script('app', asset_url('js/app.js'), array(), wp_get_theme()->get('Version'), true);
});

function contatto_form()
{
	$response['success'] = false;
	$response['message'] = __("Failed to send your message. Try again", 'yachting');
	$response['error'] = [];

	if (!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$response['error'][] = 'email';
	}
	if (!isset($_POST["name"]) || empty($_POST["name"])) {
		$response['error'][] = 'name';
	}
	if (!isset($_POST["privacy"]) || !filter_var($_POST["privacy"], FILTER_VALIDATE_BOOLEAN)) {
		$response['error'][] = 'privacy';
	}

	if (!$response['error']) {
		$mail = "<h1>New contact form request</h1>";
		$mail .= "Name: <strong>" . $_POST["name"] . "</strong><br>";
		$mail .= "Company: <strong>" . $_POST["company"] ? $_POST["company"] : '---' . "</strong><br>";
		$mail .= "Email: <strong>" . $_POST["email"] . "</strong><br>";
		$mail .= "Phone: <strong>" . $_POST["tel"] ? $_POST["tel"] : '---' . "</strong><br>";
		$mail .= "Country: <strong>" . $_POST["country"] ? $_POST["country"] : '---' . "</strong><br>";
		$mail .= "Object: <strong>" . $_POST["object"] ? $_POST["object"] : '---' . "</strong><br>";
		$mail .= "Message: <strong>" . $_POST["message"] ? $_POST["message"] : '---' . "</strong><br>";
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		$headers[] = 'Reply-To: ' . $_POST["name"] . ' <' . $_POST["email"] . '>';

		$object = '[' . get_bloginfo('name') . '] - contact form';

		if ($to = get_field('email_destinatari_form', 'option')) {
			if (wp_mail($to, $object, $mail, $headers)) {
				$response['success'] = true;
				$response['message'] = __("Your message was sent successfully. Thanks", 'yachting');
			} else {
				$response['message'] = __("Failed to send your message. Try again", 'yachting');
			}
		} else {
			$response['message'] = __("No admin email", 'yachting');
		}
	} else {
		$response['message'] = __("Required fields are missing", 'yachting');
	}

	echo json_encode(
		$response
	);

	exit;
}
add_action('wp_ajax_contatto_form', 'contatto_form');
add_action('wp_ajax_nopriv_contatto_form', 'contatto_form');


//creo option e pagine archivio servizi 
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

 // Check function exists.
 if (function_exists('acf_add_options_sub_page')) {

//   Add parent.
  $parent = acf_add_options_page(array(
   'page_title'  => __('Impostazioni header'),
   'menu_title'  => __('Impostazioni tema header'),
   'redirect'    => false,
  ));
 
 // Add parent.
 $parent = acf_add_options_page(array(
 'page_title'  => __('Impostazioni footer'),
 'menu_title'  => __('Impostazioni tema footer'),
 'redirect'    => false,
   ));
  }
}
