
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
    while ($query->have_posts()) {
        $query->the_post();
        // Display the post information as desired
        the_title(); // Example: Display the post title
        the_content(); // Example: Display the post content
        // ...
    }

    // Pagination
    echo '<div class="pagination">';
    echo paginate_links(array(
        'format'   => '?paged=%#%',
        'current'  => max(1, $paged),
        'total'    => $query->max_num_pages,
        'mid_size' => 3,
        'prev_next' => false,
    ));
    echo '</div>';
} else {
    // No posts found
}

wp_reset_postdata(); // Reset post data after the query
?>