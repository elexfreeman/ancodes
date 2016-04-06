<?php
//Методы терапии
?>
<?php get_header(); ?>


<div class="navcontainer">
    <div class="nav"><a href="/">Главная</a> / Статьи</div>
</div>

<div class="w-clearfix contentcontainer">

</div>




<?php
$args = array('posts_per_page' => 300, 'post_type' => 'staty', 'post_status' => 'publish');
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <?php $main_photo = get_field('photo');?>
    <div class="terapiaitem"><a href="<?php the_permalink(); ?>"><img src="<?php echo $main_photo['sizes']['medium']; ?>"></a>
        <div class="terapiatitle"><?php the_field( "short_anons" ); ?></div>
        <div class="terapiadesc"><?php the_field( "full_text" ); ?></div>
    </div>


<?php endwhile; else : endif; wp_reset_query(); ?>






<?php get_footer(); ?>