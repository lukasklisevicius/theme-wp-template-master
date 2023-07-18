<?php

/**
 * Template Name: Services
 */

get_header();
the_post(); ?>
<?php
$header = get_field('header');
if ($header['background']): ?>
    <div class="page-header-image" style="background-image:url('<?php echo $header['background'] ?>');">
        <h1 class="page-header-text font-headers font-bold">
            <?php echo $header['title']; ?>
        </h1>
    </div>
    <div class="max-w-[1600px] flex justify-center flex-col w-full">
<?php endif; ?>
<?php
$counter = 0;
$services = get_field('services');
if ($services): ?>
    <div class=" con flex gap-[30px] flex-col">
        <?php foreach ($services as $service) {
            $counter++;
            if ($counter % 2 == 0) {
                echo '<div class="card w-full flex flex-col md:flex-row-reverse gap-[25px]">';
                echo '<img src="' . $service['image'] . '" class="w-full md:object-cover md:w-1/3 lg:w-1/2">';
                echo '<div class="flex w-full md:w-2/3 lg:w-1/2 flex-col justify-center text-sm gap-y-[30px]">';
                echo '<h1 class="text-[40px] font-headers font-bold">' . $service['title'] . '</h1>';
                echo '<p class="">' . $service['text'] . '</p>';
                echo '</div></div>';
            } else {
                echo '<div class="card w-full flex flex-col md:flex-row gap-[25px]">';
                echo '<img src="' . $service['image'] . '" class="w-full md:object-cover md:w-1/3 lg:w-1/2">';
                echo '<div class="flex w-full md:w-2/3 lg:w-1/2 flex-col justify-center text-sm gap-y-[30px]">';
                echo '<h1 class="text-[40px] font-headers font-bold">' . $service['title'] . '</h1>';
                echo '<p class="">' . $service['text'] . '</p>';
                echo '</div></div>';
            }
        } ?>
    </div>
<?php endif; ?>
<?php 
$form_header = get_field('form-header');
if($form_header):?>
<div class="con flex w-full pt-0 h-full flex-col lg:flex-row ">
    <div class="p-[30px] flex justify-center flex-col w-full lg:w-1/2 bg-[#8AC6D0]">
        <h1 class="text-white text-[40px] font-headers font-bold"><?php echo $form_header;?></h1>
        <?php include(locate_template('components/form.php')); ?>
    </div>

    <?php 
    $form_img = get_field('form-image');
    if($form_img):
    ?>
    <div class="w-full lg:w-1/2">
        <img class="object-cover w-full h-full" src="<?php echo $form_img['url']?>" alt="<?php echo $form_img['alt']?>">
    </div>
    <?php endif;?>
</div>
<?php endif;?>

<?php
get_footer();