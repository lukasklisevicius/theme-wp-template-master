<?php
/**
 * Template Name: Gallery
 */

get_header();
the_post();
?>
    <?php
    $header = get_field('header');
    if ($header['background']) : ?>
        <div class="page-header-image" style="background-image:url('<?php echo $header['background'] ?>');">
            <h1 class="page-header-text font-headers font-bold">
                <?php echo $header['title']; ?>
            </h1>
        </div>
        <div class="max-w-[1600px] flex justify-center flex-col w-full">
    <?php endif; ?>

<div x-data="alpineLightbox()">


    <div class="con flex items-center justify-center flex-col gap-[30px] md:flex-row md:flex-wrap">
        <?php
        // Retrieve the ACF gallery field
        $gallery_images = get_field('gallery');
        if ($gallery_images) {
            foreach ($gallery_images as $image) {
                $thumbnail = $image['sizes']['thumbnail'];
                $fullsize = $image['url'];
                $alt = $image['alt'];
        ?>
                <!-- Start thumbnail -->
                <figure class="transition-shadow duration-200 ease-out cursor-pointer w-full md:w-1/3 lg:w-1/4"
                    @click="openLightbox('<?php echo esc_url($fullsize); ?>', '<?php echo esc_attr($alt); ?>')">
                    <img class="block object-cover max-h-[245px] w-full h-full" src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($alt); ?>">
                </figure>
                <!-- End thumbnail -->
        <?php
            }
        }
        ?>
    </div>

    <!-- Start lightbox -->
    <div x-show="imgModal" @keydown.escape.window="closeLightbox"
    class="fixed inset-0 z-50 grid w-screen h-screen max-w-[100%] max-h-[100vh] gap-2 px-4 bg-black bg-opacity-95 sm:px-12 place-items-center grid-rows-lightbox"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-10"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <img class="block object-contain w-full lg:w-8/12 h-full row-start-2" :src="imgModalSrc" :alt="imgModalDesc"
        x-transition:enter="transition ease-out duration-300 delay-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-10"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <button @click="closeLightbox"
        class="flex items-center p-2 text-white row-start-3" aria-label="Close">
        <svg class="w-8 h-8 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

</div>
    <!-- End lightbox -->
</div>


<script>
    function alpineLightbox() {
        return {
            imgModal: false,
            imgModalSrc: '',
            imgModalDesc: '',
            openLightbox(src, desc) {
                this.imgModalSrc = src;
                this.imgModalDesc = desc;
                this.imgModal = true;
                // Prevent the window from scrolling
                const html = document.documentElement;
                html.classList.add('h-screen', 'overflow-hidden', 'scroll-none');
            },
            closeLightbox() {
                this.imgModal = false;
                // Return window to its normal state
                const html = document.documentElement;
                html.classList.remove('h-screen', 'overflow-hidden', 'scroll-none');
                setTimeout(()=>{
                    this.imgModalSrc = '';
                this.imgModalDesc = '';
                },200)
            }
        };
    }
</script>

<?php
get_footer();
?>