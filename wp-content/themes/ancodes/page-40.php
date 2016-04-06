<?php
//Методы терапии
?>
<?php get_header(); ?>


<div class="navcontainer">
    <div class="nav"><a href="/">Главная</a> / Методы терапии</div>
</div>

<div class="w-clearfix contentcontainer">

</div>




<?php
$args = array('posts_per_page' => 500, 'post_type' => 'metods_teapy', 'post_status' => 'publish');
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <?php $main_photo = get_field('main_photo');?>
    <div class="terapiaitem"><img src="<?php echo $main_photo['sizes']['large']; ?>">
        <div class="terapiatitle">
            <a  class="specanduslugili"  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <div class="terapiadesc"><?php the_field( "description" ); ?></div>
    </div>



<?php endwhile; else : endif; wp_reset_query(); ?>






<?php get_footer(); ?>