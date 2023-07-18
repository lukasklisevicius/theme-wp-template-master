<?php

/**
 * Header
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<script>
		document.documentElement.className =
			document.documentElement.className.replace("no-js", "js");
	</script>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
		integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>
		<?php echo wp_get_document_title(); ?>
	</title>
	<?php wp_head(); ?>

</head>

<body <?php body_class("min-h-screen text-primary-text flex flex-col text-base"); ?> x-data="{ hamburger: false }"
	:class="hamburger ? 'overflow-hidden' : ''">

	<?php
	wp_body_open();
	?>

	<header id="header" class="bg-white relative " role="banner">
		<div class="w-full flex items-center justify-center h-10 bg-[#8AC6D0] text-white text-sm">Contattaci: +39
			3400283749</div>
		<div class="w-full flex items-center justify-center h-[110px] border-b-[1px]">

			<div class="w-full h-full flex items-center justify-center relative">
				<?php if (has_custom_logo()) {
					if (is_front_page()) {
						echo '<h1>';
					}
					the_custom_logo();
					if (is_front_page()) {
						echo '</h1>';
					}
				} else { ?>
					<div class="w-[82px] h-[82px] aboslute bg-[#8AC6D0] rounded-full flex items-end justify-center"></div>
					<a class="w-auto text-primary-text absolute mt-[50px]" href="<?php echo get_home_url(); ?>">
						<h1 class="uppercase font-extrabold text-[20px]">
							<?php bloginfo('name'); ?>
						</h1>
					</a>
				<?php } ?>
			</div>
		</div>

		<div class="hidden md:block">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'main',
					'container' => 'ul',
					'add_li_class' => '',
					'add_link_class' => ''
				)
			); ?>
		</div>

		<div :class="hamburger ? '' : 'hidden opacity-0'" x-cloak @click="hamburger = false">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'main',
						'container_class' => 'w-full',
						'menu_class' => 'main-menu flex flex-col h-full uppercase w-full text-center',
						'menu_id' => 'desktop-main-menu ',
						'add_li_class'  => 'px-8 first:pl-0 last:pr-0 leading-none tracking-widest',
						'add_link_class'  => 'duration-300 transition-all border-b border-transparent hover:border-gray-300'
					)
				); ?>
			</div>

			<div class="ml-auto pl-4 z-20 md:hidden lg:hidden">
				<button class="hamburger" type="button" :class="hamburger ? 'is-active' : ''" @click="hamburger = !hamburger">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</div>

	</header><!-- #site-header -->

	<div id="primary" class="font-[Open_Sans] center">
		<main id="main" role="main" class=" flex justify-center items-center flex-col w-full">
			