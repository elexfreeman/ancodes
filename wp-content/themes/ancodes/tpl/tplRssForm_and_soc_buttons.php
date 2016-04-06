<div class="contacts">
    <h4>Подписаться на рассылку</h4>
    <form action="#" class="rss-form">
        <fieldset>
            <input type="text" class="text" placeholder="Ваша эл.почта"/>
            <input type="submit" class="submit" value="Поехали!"/>
        </fieldset>
    </form>
    <ul class="social-list">
        <?php
        //этот запрос нужно оптимизировать хз как пока сраный WP
        $args = array('posts_per_page' => 30, 'post_type' => 'page', 'title' => 'Главная');
        $the_query = new WP_Query( $args );
        if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php if(get_the_title()=='Главная' )
            {
                ?>
                <li class="ok"><a href="<?php  the_field( "ok_link" ); ?>">ok</a></li>
                <li class="fb"><a href="<?php  the_field( "fb_link" ); ?>">fb</a></li>
                <li class="vk"><a href="<?php  the_field( "vk_link" ); ?>">vk</a></li>
                <li class="twitter"><a href="<?php  the_field( "twitter_link" ); ?>">twitter</a></li>
                <li class="instagram"><a href="<?php  the_field( "instagram_link" ); ?>">instagram</a></li>

                <?php
            }
            ?>
        <?php endwhile; else : endif; wp_reset_query(); ?>

    </ul>
</div>