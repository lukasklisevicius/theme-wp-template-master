<?php

/**
 * Template Name: Contacts
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
<div class="con flex w-full pb-0 h-full flex-col lg:flex-row ">
    <div class="p-[30px] flex justify-center flex-col w-full lg:w-1/2 border-t-[1px] border-l-[1px] border-r-[1px] border-[#e5e7eb]">
        <h1 class="text-[40px] font-headers font-bold">Orari</h1>
        <ul class="">
            <li class="flex border-b-[1px] uppercase justify-between py-[20px]">DAL LUNEDì AL VENERDì<span> 9:00 -
                    12:00 / 14:00 - 19:00</span></li>
            <li class="flex border-b-[1px] uppercase justify-between py-[20px]">SABATO<span> 9:00 - 12:00</span></li>
            <li class="flex border-b-[1px] uppercase justify-between py-[20px]">DOMENICA<span>CHIUSO</span></li>

        </ul>
        <h1 class="text-[40px] pt-[30px] font-headers font-bold">Dove siamo</h1>
        <div class="py-[50px] text-red">
            <p>Via Roma 125</p>
            <p>30000 Milano (MI)</p> 
            <p>+39 3402827636</p>
        </div>
    </div>
    <div class="w-full lg:w-1/2 min-h-[400px]">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d147552.19933576317!2d25.088229202058105!3d54.700771068965246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd93fb5c6408f5%3A0x400d18c70e9dc40!2sVilnius%2C%20Vilniaus%20m.%20sav.!5e0!3m2!1slt!2slt!4v1689580533371!5m2!1slt!2slt"
            width="100%" height="100%" style="border:0;min-height:400px;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
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