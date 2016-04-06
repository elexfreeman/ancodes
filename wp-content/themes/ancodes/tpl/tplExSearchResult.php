<div class="title">
    <h2>Экскурсии</h2>
</div>
<ul class="tours-list">
    <?php
    $p_id=1;
    if($the_query->found_posts>0)
    {
    if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php $mainimg = get_field('e_img');?>

        <li>
            <h3><?php the_title(); ?></h3>
            <p><?php  the_field( "description" ); ?> ... </p>
            <div class="holder">
                <div class="image">
                    <img src="<?php echo $mainimg['sizes']['large']; ?>" height="80" width="120" alt="">
                </div>
                <div class="text">
                    <dl>
                        <dt>Время:</dt>
                        <dd><?php  the_field( "e_time" ); ?></dd>
                        <dt>Место сбора:</dt>
                        <dd><?php  the_field( "e_place_start" ); ?></dd>
                    </dl>
                    <span class="price-label">цена, &euro; с человека</span>
                    <span class="price"><?php  the_field( "e_price" ); ?></span>
                </div>
            </div>
            <span class="favorite">В избранное</span>
        </li>

    <?php endwhile; else : endif;
    }

    else
    {
        ?>
        <h3>Результаты поиска отсутствуют.</h3>
    <?php
    }
?>
</ul>