<?php
get_header();
?>
    <div class="max-w-[1600px] flex justify-center flex-col w-full">
<div class="con pb-0 pt-[50px] flex flex-col md:flex-row gap-[30px] ">

    <?php
    if (have_posts()) :
        ?>

        <div class="single-post w-full md:w-2/3">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <!-- Display ACF fields for the current post -->
                <h1 class="font-headers text-[40px] pb-[20px] font-bold"><?php the_title(); ?></h1>
                <?php
                // Retrieve and display ACF fields
                $image = get_field('image');
                ?>
                <img class="w-full" src="<?php echo $image; ?>" alt="" srcset="">
                <?php
                $rows = get_field('content');
                if ($rows) :
                    foreach ($rows as $row) {
                        if ($row['bg']) {
                            echo '<div class="con bg-[#8AC6D0]">';
                            echo '<p class="text-white font-headers italic text-[20px] font-bold">' . wp_trim_words($row['text'], 38) . '</p>';
                            echo '</div>';
                        } else {
                            echo '<div class="con px-0">';
                            echo '<p class="text-sm">' . $row['text'] . '</p>';
                            echo '</div>';
                        }
                    }
                endif;
                ?>
            <?php
            endwhile;
            ?>
        </div>

    <?php
    endif;
    ?>

    <div class="other-content md:w-1/3">
        <!-- Add content for the "other-content" section -->
<!-- Retrieve data from another page -->
<?php
        $other_page_slug = 'about'; // Replace with the actual slug of the other page
        $other_page = get_page_by_path($other_page_slug);
        if ($other_page) {
            $other_page_title = $other_page->post_title;
            $other_page_image = get_field('header', $other_page->ID);
            $other_page_content = get_field('section1', $other_page->ID);

            echo '<h2 class="h-[80px] font-headers pb-[20px] font-bold text-[30px] flex justify-center items-end">' . $other_page_title . '</h2>';

            if ($other_page_image) {
                echo '<img class="w-full" src="' . $other_page_image['background'] . '" alt="">';
            }

            if ($other_page_content) {
                echo '<div class="py-[20px] border-b-[1px]">' . $other_page_content['text1'] . '</div>';
            }
        }
        ?>
        		<div class=" w-full py-[30px] border-b-[1px] flex items-center justify-center flex-col">
			<h2 class="font-bold text-[30px] font-headers">I nostri social</h2>
			<?php include(locate_template('components/social.php')); ?>
		</div>

<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC',
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    ?>
    <h1 class="text-[30px] font-headers font-bold text-center py-[30px]">Notizie recenti</h1>
    <div class="con pt-0 pb-[20px] flex flex-col gap-[30px]">
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            $custom_field_value = get_field('image');
            // Example: Display the value of a custom field
            ?>
            <div x-data="{url: '<?php the_permalink();?>'}" @click="window.open(url,'_self')" class="w-full flex gap-[30px] max-h-[150px] cursor-pointer">
                <img class="w-1/3 object-cover lg:w-1/2" src="<?php echo $custom_field_value; ?>" alt="" srcset="">
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
                                    echo '<p class="text-sm md:hidden lg:block">' . wp_trim_words($row['text'],'13') . '</p>';
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
?></div>    </div>
</div><?php
wp_reset_postdata(); // Reset post data after the query
?>

<?php
get_footer();
?>