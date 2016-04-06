<?php
//Методы терапии
?>
<?php get_header(); ?>

    <div class="navcontainer">
        <div class="nav"><a href="/">Главная</a> / Специалисты и услуги</div>
    </div>

    <div class="w-clearfix contentcontainer">

        <?php
        $args = array('posts_per_page' => 300, 'post_type' => 'specialists', 'post_status' => 'publish' ,'orderby'=>'menu_order');
        $the_query = new WP_Query( $args );
        if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php $main_photo = get_field('main_photo');?>


            <div class="w-clearfix specialistitem"><img class="specialistimage" src="<?php echo $main_photo['sizes']['medium']; ?>">
                <div class="specialistname"><a href="<?php the_permalink(); ?>"><?php the_title();?></a>,</div>
                <div class="specialistposition"><?php the_field( "doljnost" ); ?></div>
                <div class="specialistdesc"><?php the_field( "description" ); ?></div>

            </div>

        <?php endwhile; else : endif; wp_reset_query(); ?>


    </div>

<?php get_footer(); ?>