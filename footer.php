<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 */

?>
</div>
</main>
</div><!-- #content -->

<footer id="footer" class=" con py-0 mt-auto flex flex-col items-center justify-center" role="contentinfo">
	<div class="w-full flex  items-center justify-center h-[110px] border-b-[1px] border-t-[1px] ">

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
	<div
		class="w-full flex-col md:flex-row pt-[30px] px-[5%] pb-[30px] flex border-b-[1px] flex items-start gap-[30px] justify-between ">
		<?php
		$contacts = get_field('contacts', 'option');
		if ($contacts):
			?>
			<div class="h-full w-full">
				<h1 class="font-bold text-[18px] font-headers">Contattaci</h1>
				<p class="text-[13px]">
					<?php echo $contacts['name']; ?>
				</p>
				<p class="text-[13px]">
					<?php echo $contacts['address']; ?>
				</p>
				<p class="text-[13px]">Telefono: <a href="tel:<?php echo $contacts['phone']; ?>"><?php echo $contacts['phone']; ?></a></p>
				<p class="text-[13px]">Mail: <a href="email:<?php echo $contacts['email']; ?>"><?php echo $contacts['email']; ?></a></p>

			</div>
		<?php endif; ?>
		<?php
		$times = get_field('time', 'option');
		if ($times) {
			echo '<div class="h-full w-full">';
			echo '<h1 class="font-bold text-[18px] font-headers">Orari</h1>';
			// if($times):
			foreach ($times as $tim) {
				echo '<p class="text-[13px]">' . $tim['input'] . '</p>';
			}
			echo '</div>';
		}
		;
		?>
		<div class="h-full w-full">
			<h1 class="font-bold text-[18px] font-headers">Social</h1>
			<?php include(locate_template('components/social.php')); ?>
		</div>
		<?php
		$social = get_field('social', 'option');
		if ($social):
			?>
			<div class="h-full w-full">
				<h1 class="font-bold text-[18px] font-headers">Menu</h1>
				<?php wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container' => 'ul',
						'add_li_class' => 'text-[13px]',
						'add_link_class' => ''
					)
				); ?>
			</div>
		<?php endif; ?>
	</div>


	</div>
	<?php
	$tags = get_field('other-tags', 'option');
	if ($tags) {
		echo '<div class="w-full flex tags items-center justify-center py-[20px]"> ';
		echo '<div class="w-3/4 flex flex-col md:flex-row md:flex-wrap items-center justify-center">';
		foreach ($tags as $tag) {
			echo '<p class="text-[13px] md:border-r p-x-[20px]">' . $tag['input'] . '</p>';
		}
		echo '</div></div>';
	}
	;
	?>


	<?php wp_footer(); ?>

	</body>

	</html>