<div class="full-width-slider">
    <div id="slideshow0" class="owl-carousel" style="opacity: 1;">
        <?php
        $args = array('posts_per_page' => 30, 'post_type' => 'slider', 'post_status' => 'publish');
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()): while ($the_query->have_posts()) :
        $the_query->the_post(); ?>
        <?php $img = get_field('slide_img'); ?>

        <div class="item">

            <div style="background-image: url('<?php echo $img['url']; ?>');"
                 src="/images/21-max-1920.jpg"
                 alt="При заказе от 500 рублей ролл в подарок!" class="slider-img">
            </div>
        </div>

    <?php endwhile; else :
    endif;
    wp_reset_query(); ?>
</div>
</div>


<script type="text/javascript">

    $('#slideshow0').owlCarousel({
        items: 6,
        autoPlay: 8000,
        singleItem: true,
        navigation: true,
        navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
        pagination: false
    });

</script>

<style>
    .slider-img {
        height: 584px;
        /* overflow: hidden; */

         background-size: 100% 100%;
        background-repeat: no-repeat;
    }

    .full-width-slider
    {
        width: 100%
    }

</style>