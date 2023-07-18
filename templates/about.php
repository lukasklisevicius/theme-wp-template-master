<?php

/**
 * Template Name: About
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
$section1 = get_field('section1');
if ($section1['text1']): ?>
    <div class="center con">
        <p class="text-center">
            <?php echo $section1['text1']; ?>
        </p>
    </div>
<?php endif; ?>
<div class="con pt-0 center flex-col lg:flex-row">
    <?php
    $section1 = get_field('section1');
    $sectioncontent = $section1['section_content'];
    if ($sectioncontent): ?>
        <img src="<?php echo $sectioncontent['image']; ?>" class="w-full lg:w-1/2">
    <?php endif; ?>
    <?php if ($sectioncontent): ?>
        <div class="center flex-col text-center lg:items-start lg:w-1/2 lg:text-left ml-[5%]">
            <h1 class="text-[40px] font-headers font-bold lg:text-left">
                <?php echo $sectioncontent['title']; ?>
            </h1>
            <p class="mb-[5%]">
                <?php echo $section1['text2']; ?>
            </p>
            <p class="">
                <?php echo $section1['text3']; ?>
            </p>
        </div>
    </div>
<?php endif; ?>

<?php
$section2 = get_field('team_section');
$team_header = $section2['team_header'];
if ($section2): ?>
    <div class=" center bg-no-repeat bg-center bg-cover"
        style="background-image:url('<?php echo $team_header['background_image'] ?>');">
        <div class="center md:pb-[20%] md:justify-start  flex-col text-center text-white con overlay">
            <h1 class="text-[40px] font-headers font-bold">
                <?php echo $team_header['label']; ?>
            </h1>
            <p class="">
                <?php echo $team_header['text1']; ?>
            </p>
        </div>
    </div>
<?php endif; ?>
<?php
$members = $section2['team_members'];
if ($members): ?>
    <div
        class="con md:relative md:top-[-100px] lg:top-[-150px] center flex-col md:pb-0 md:flex-row md:flex-wrap w-full gap-[25px] pt-0">
        <?php foreach ($members as $member) {
            echo '<div class="card w-full flex flex-col gap-[25px] py-[5%] md:py-0 md:w-1/3 lg:w-1/5"> ';
            echo '<img class="w-full" style="object-fit:cover" src="' . $member['image'] . '">';
            echo '<h3 class="text-center text-[18px] font-headers font-bold">' . $member['full_name'] . '</h3>';
            echo '<p class="text-center text-sm">' . $member['text'] . '</p>';
            echo '</div>';
        } ?>
    </div>
<?php endif; ?>

<?php
$section3 = get_field('section_3');
if ($section3):
    ?>
    <div class="overlay h-full bg-no-repeat"
        style="background-image:url('<?php echo $section3['background_image'] ?>');">
        <div class="overlay text-white con text-center">
            <h1 class="text-xl md:text-[26px] lg:text-[40px] font-headers font-bold">
                <?php echo $section3['text1'] ?>
            </h1>
            <p class="text-white font-sig">
                <?php echo $section3['sig']; ?>
            </p>
        </div>
    </div>

<?php endif; ?>


<?php
get_footer();