<?php

//этот запрос нужно оптимизировать хз как пока сраный WP
$args = array( 'page_id' => 2 );



$the_query = new WP_Query( $args );
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<div class="agency">

    <h3>Агентствам</h3>
    <!-- <h3>Онлайн бронирование <br />для турагентств</h3> -->

    <a target="_blank" href="<?php  the_field( "enter_link" ); ?>" class="enter"><span>Войти в систему</span></a>

</div>

<?php endwhile; else : endif; wp_reset_query(); ?>