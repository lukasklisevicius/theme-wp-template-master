<?php 
	$social = get_field('social','option');
	if($social):
	?>

	<div class="flex gap-[10px]">
        <a target="_blank" rel="nofollow" class="text-[26px] w-[26px] h-[26px]" href="<?php echo $social['facebook']; ?>"><i class="fa-brands fa-square-facebook"></i></a>
		<a target="_blank" rel="nofollow" class="text-[26px] w-[26px] h-[26px]" href="<?php echo $social['instagram']; ?>"><i class="fab fa-instagram"></i></a>
		<a target="_blank" rel="nofollow" class="text-[26px] w-[26px] h-[26px]" href="<?php echo $social['twitter']; ?>"><i class="fa-brands fa-square-twitter"></i></a>
		<a target="_blank" rel="nofollow" class="text-[26px] w-[26px] h-[26px]" href="<?php echo $social['printerest']; ?>"><i class="fa-brands fa-square-pinterest"></i></a>
	</div>	

	<?php endif;?> 