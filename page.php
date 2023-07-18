<?php

/**
 * page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
the_post(); ?>

<?php if (has_post_thumbnail()) : ?>
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-96">
<?php endif; ?>


<div class="container pt-10 pb-16">
    <div class="prose">
        <h1><?php the_title(); ?></h1>
        <?php
        the_content(); ?>
    </div>
</div>


<?php
get_footer();
