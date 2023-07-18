<?php

/**
 * Template Name: Pagina semplice
 */

get_header();
the_post(); ?>

<?php if (has_post_thumbnail()): ?>
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full">
<?php endif; ?>


<div class="container pt-10 pb-16">
    <h1>
        <?php the_title(); ?>
    </h1>
    <?php if (!empty(get_the_content())): ?>
        <div class="prose">
            <?php
            the_content(); ?>
        </div>
    <?php endif; ?>
</div>



<?php
get_footer();