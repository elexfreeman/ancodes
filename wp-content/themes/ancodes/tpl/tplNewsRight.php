<div class="news">
    <h3>Новости</h3>
    <ul class="news-list">
        <?php
        if(!is_user_logged_in())  $args = array('posts_per_page' => 300, 'post_type' => 'news', 'post_status' => 'publish',
        'meta_query'	=> array(
            // 'relation'		=> 'AND',
            array(
                'key'	 	=> 'registered',
                'value'	  	=> 1,
                'compare' 	=> '!=',
            ),
            /*    array(
                    'key'	  	=> 'featured',
                    'value'	  	=> '1',
                    'compare' 	=> '=',
                ),*/
        ) ); else $args = array('posts_per_page' => 300, 'post_type' => 'news', 'post_status' => 'publish' );


        $the_query = new WP_Query( $args );
        $p_id=0;
        if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php $mainimg = get_field('photo');$p_id++;?>

                <li>
                    <p><a href="/news/#news-popup<?php echo $p_id; ?>"><?php the_field( "short_anons" ); ?> </a></p>
                    <span class="date"><?php echo NewsConvertDate(get_field( "date" )); ?></span>
                </li>


        <?php endwhile; else : endif; wp_reset_query(); ?>

    </ul>
    <a href="/news/" class="read-more"><span>Все новости</span></a>
</div>