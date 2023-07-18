<?php

/**
 * Template Name: Blog
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
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    ?>
    <h1 class="text-[40px] font-headers font-bold text-center py-[30px]">Notizie recenti</h1>
    <div class="con pt-0 pb-[20px] border-b-[1px] flex flex-col lg:flex-row gap-[30px]">
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            $custom_field_value = get_field('image');
            // Example: Display the value of a custom field
            ?>
            <div x-data="{url: '<?php the_permalink();?>'}" @click="window.open(url,'_self')" class="w-full lg:w-1/3 flex gap-[30px] max-h-[150px] cursor-pointer">
                <img class="w-1/3 object-cover" src="<?php echo $custom_field_value; ?>" alt="" srcset="">
                <div class="flex flex-col w-2/3">
                    <h1 class="text-[18px] font-bold font-headers">
                        <?php the_title(); ?>
                    </h1>
                    <?php
                    $rows = get_field('content');
                    $count = 0;
                    if ($rows): ?>
                            <?php foreach ($rows as $row) {
                                if($count == 0){
                                    echo '<p class="text-sm">' . wp_trim_words($row['text'],'13') . '</p>';
                                }else{
                                    break;
                                }
                                $count++;
                            } ?>
                    <?php endif; ?>

                </div>
            </div>
            <?php
            // Display the post information as desired
            // Example: Display the post title
    
        }
} else {
    // No posts found
}
?></div><?php
wp_reset_postdata(); // Reset post data after the query
?>

<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $paged,
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    ?>
    <div class="con flex flex-col w-full gap-[30px] "><?php
    while ($query->have_posts()) {
        $query->the_post();
                    $custom_field_value = get_field('image');
            // Example: Display the value of a custom field
            ?>
                        <div x-data="{url: '<?php the_permalink();?>'}" @click="window.open(url,'_self')" class="w-full md:flex-row even:md:flex-row-reverse flex flex-col gap-[30px]">
                <img class="w-full md:w-1/3 lg:w-1/2 object-cover" src="<?php echo $custom_field_value; ?>" alt="" srcset="">
                <div class="flex flex-col w-full lg:w-1/2 justify-center gap-[30px]">
                    <h1 class="text-[40px] font-bold font-headers">
                        <?php the_title(); ?>
                    </h1>
                    <?php
                    $rows = get_field('content');
                    $count = 0;
                    if ($rows): ?>
                            <?php foreach ($rows as $row) {
                                if($count == 0){
                                    ?>
                                    <p class="text-sm"><?php echo $row['text']; ?></p>
                                    <button  x-data="{url: '<?php the_permalink();?>'}" @click="window.open(url,'_self')" class="border-[#8AC6D0] rounded-full py-[10px] px-[45px] border-[1px] w-fit text-[#8AC6D0] uppercase hover:text-white hover:bg-[#8AC6D0] duration-100 active:scale-95">Leggi di più</button>
                                    <?php
                                }else{
                                    break;
                                }
                                $count++;
                            } ?>
                    <?php endif; ?>

                </div>
            </div>
            <?php

    }

    // Pagination
    echo '<div class="pagination flex w-full items-center justify-center">';
    echo paginate_links(array(
        'format'           => '?paged=%#%',
        'current'          => max(1, $paged),
        'total'            => $query->max_num_pages,
        'mid_size'         => 3,
        'prev_next'        => false,
        'before_page_number' => '<span class="page-number box w-[32px] h-[32px] flex justify-center">',
        'after_page_number' => '</span>',
        'current_class'    => 'current-page',
        'echo'             => true,
    ));
    echo '</div>';
} else {
    // No posts found
}

wp_reset_postdata(); // Reset post data after the query
?>





    <?php
    get_footer();