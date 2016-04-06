<header class="header" style="height: Auto;">
    <div class="wrapper">
        <strong class="logo">
            <a href="/">Ancodes<span class="sticker"><img src="/images/img01.png" alt="#" width="88" height="89" /></span></a>
        </strong>
        <div class="top-line">
            <div class="holder">
                <?php $the_query = new WP_Query( array( 'page_id' => 2 ) ); while ($the_query -> have_posts()) : $the_query -> the_post(); if( get_field('showlang') ) { ?>

                    <form action="#" class="language-form">
                        <fieldset>
                            <select data-jcf='{"wrapNative": false}'>
                                <option data-image="images/ico-flag.png">Русский</option>
                                <option data-image="images/ico-flag.png">Английский</option>
                            </select>
                        </fieldset>
                    </form>

                <?php } endwhile; wp_reset_postdata(); ?>
                <!-- <a href="/sitemap/" class="site-map"><span>Карта сайта</span></a> -->
                <?php tplSignIn(); ?>
                <span id="f_link">
                <?php $ff = new Favorites();$ff->UpdateMenu(); ?>
                </span>
            </div>
        </div>
        <?php tplNavLine(); ?>
        <div class="intro">
            <h1><?php the_title();?></h1>
            <ul class="breadcrumbs">
                <li><a href="/">Главная</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
        <div class="reservation">
            <div class="client">
                <h3>Онлайн бронирование</h3>
                <ul class="reservation-list">
                    <?php
                    $args = array('posts_per_page' => 30, 'post_type' => 'page', 'title' => 'Главная');
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php if(get_the_title()=='Главная' )
                        {
                            ?>
                            <li class="item2"><a target="_blank" href="<?php  the_field( "bulet_link" ); ?>"><span>Билеты</span></a></li>
                            <li class="item3"><a target="_blank" href="<?php  the_field( "hotels_link" ); ?>"><span>Отели</span></a></li>
                            <li class="item4"><a target="_blank" href="<?php  the_field( "transf_link" ); ?>"><span>Трансферы</span></a></li>
                            <?php
                        }
                        ?>
                    <?php endwhile; else : endif; wp_reset_query(); ?>
                </ul>
            </div>
            <?php tplAgency(); ?>
        </div>
    </div>
</header>