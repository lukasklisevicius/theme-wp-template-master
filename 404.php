<?php
get_header();
?>
<div class="container">
    <div class="flex flex-col justify-center items-center py-24 space-y-8">
        <h1 class="text-2xl lg:text-5xl">404</h1>
        <a class="btn-primary" href="<?php echo get_home_url(); ?>"><?php _e("Torna alla Home", 'theme'); ?></a>
    </div>
</div>
<?php
get_footer();
