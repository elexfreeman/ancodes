<?php
//Методы терапии
?>
<?php get_header(); ?>

<div class="navcontainer">
    <div class="nav"><a href="/">Главная</a> / Список всех услуг</div>
</div>

<div class="w-clearfix contentcontainer">

</div>

    <div class="w-clearfix contentcontainer">

            <table class="table-usl">
                <?php
                $category='';
                $args = array('posts_per_page' => 300,
                    'post_type' => 'services',
                    'post_status' => 'publish'
                ,'orderby'=>'menu_order',
                   // 'orderby' => 'medical_category',
                  //  'meta_key'=>'medical_category',
                    'order'=>'DESC'
);
                $the_query = new WP_Query( $args );
                if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


                    <?php
                    if((get_field( "price_part")=='Основной')or(get_field( "price_part")==''))
                    {
                        if($category!= get_field( "medical_category" ))
                        {
                            $category= get_field( "medical_category" );
                            ?>
                            <tr>
                                <td class="usl-head" colspan="2"><?php  the_field( "medical_category" ); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td><?php the_title(); ?></td>
                            <td><?php if (get_field("price")) {  the_field( "price" ); ?>&nbsp;₽<?php } ?></td>
                        </tr>

                        <?php
                        }
                       ?>

                    <!--
                    <div class="w-clearfix usluga">
                        <div class="price"><?php if (get_field("price")) {  the_field( "price" ); ?>&nbsp;₽<?php } ?></div>
                        <div class="uslugatitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="uslugashortdesc"><?php the_field( "description" ); ?> <?php the_field( "category" ); ?></div>
                    </div>
                    -->
                <?php endwhile; else : endif; wp_reset_query(); ?>

            </table>

        <h3 class="usl-head lab" onclick="$('.lab-table').toggle('slow');" style="cursor:pointer">Лабораторные услуги</h3>
     <div class="lab-table" style="display: none;">
         <?php   the_content(); ?>
     </div>



        <h3 class="usl-head lab"
            onclick="$('.lavb_screen_price').toggle('slow');" style="cursor:pointer">Лабораторный скрининг</h3>
        <div class="lavb_screen_price" style="display: none;">
            <?php   the_field( "lavb_screen_price" ); ?>
        </div>

        <!--
        <table class="table-usl">
            <?php
            $category='';
            $args = array('posts_per_page' => 300,
                'post_type' => 'services',
                'post_status' => 'publish',
                'orderby' => 'medical_category',
                'meta_key'=>'medical_category',
                    'order'=>'DESC'
                 );
            $the_query = new WP_Query( $args );
            if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


                <?php
                if(get_field( "price_part")=='Лаборатория')
                {
                    if($category!= get_field( "medical_category" ))
                    {
                        $category= get_field( "medical_category" );

                    }
                    ?>
                    <tr>
                        <td><?php the_title(); ?></td>

                        <td ><?php if (get_field("price")) {  the_field( "price" ); ?>&nbsp;₽<?php } ?></td>
                    </tr>

                    <?php
                }
                ?>


            <?php endwhile; else : endif; wp_reset_query(); ?>

        </table>

        -->
        </div>


<?php get_footer(); ?>