<?php get_header(); ?>
<?php $search = new RentaSearch(); ?>
    <div class="page">
        <?php GetSinglePageHeader();?>
        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="content">
                        <div class="title">
                            <h2>Дома, виллы и апартаменты</h2>
                        </div>
                        <ul class="apartments-list">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $args = array('posts_per_page' => 10, 'post_type' => 'rent_house', 'post_status' => 'publish','paged' => $paged);
                            $the_query = new WP_Query( $args );
                            $p_id=0;
                            $p_count=0;
                            $rent = Array();

                            if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <?php $mainimg = get_field('r_img'); $p_count++;$p_id++;
                                $r_page = new stdClass();
                                $r_page->r_img=get_field('r_img');
                                $r_page->r_params=get_field('r_params');
                                $r_page->rent_type=get_field('rent_type');
                                $r_page->rent_company=get_field('rent_company');
                                $r_page->the_title=get_the_title();
                                $r_page->r_price=get_field('r_price');
                                $r_page->square=get_field('square');
                                $r_page->rooms=get_field('rooms');
                                $r_page->r_photos=get_field('r_photos');
                                $r_page->r_descripton=get_field('r_descripton');
                                $r_page->r_hot=get_field('r_hot');
                                $r_page->r_other=get_field('other');
                                $r_page->r_place=get_field('r_place');
                                $r_page->r_city=get_field('r_city');
                                $r_page->r_customplace=get_field('r_customplace');
                                $r_page->r_customplace=get_field('r_customplace');
                                $r_page->r_beach_length=get_field('r_beach_length');
                                $r_page->id=get_the_ID();
                                $rent[]=$r_page;
                                ?>
                                <li>
                                    <a href="#apartments-popup<?php echo $p_id;?>" data-fancybox-group="apartments-gallery" class="apartments-popup-link">
                                        <div class="heading">
                                            <span class="type"></span>
                                            <?php
                                            $ff = new Favorites();
                                            if($ff->IsIn(get_the_ID()))
                                            {
                                                ?>
                                                <span class="star chosen f_<?php the_ID(); ?>" onclick="Favorites.Add(<?php echo $r_page->id; ?>)">*</span>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <span class="star f_<?php the_ID(); ?>" onclick="Favorites.Add(<?php echo $r_page->id; ?>)">*</span>
                                                <?php
                                            }
                                            ?>

                                             <span class="location"><?php  the_field( "rent_type" ); ?> <?php  the_title(); ?></span>

                                        </div>
                                        <!--<span class="seller">Локация <?php  the_field( "rent_company" ); ?></span> -->

                                        <div class="info-holder">
                                            <div class="image"><img src="<?php echo $mainimg['sizes']['large']; ?>" alt="#" width="120" height="80" /></div>
                                            <div class="text-holder">
                                                <span>Площадь <?php  the_field( "square" ); ?>м&sup2;</span>
                                                <span><?php
                                                    if($r_page->rooms==1) echo  $r_page->rooms. ' спальня';
                                                    if($r_page->roomsms==2) echo  $r_page->rooms. ' спальни';
                                                    if($r_page->rooms==3) echo  $r_page->rooms. ' спальни';
                                                    if($r_page->rooms==4) echo  $r_page->rooms. ' спальни';
                                                    if($r_page->rooms>4) echo  $r_page->rooms. ' спален'; ?></span>
                                                <div class="price">
                                                    <span>цена, &euro; в месяц</span>
                                                    <span class="sum"><?php  the_field( "r_price" ); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                            $r_hot=get_field('r_hot');
                                            if($r_hot[0]=='Горячее предложние')
                                            {
                                                ?>
                                                <span class="marker"></span>
                                                <?php
                                            }
                                        ?>
                                        </a>
                                </li>

                            <?php endwhile;




                            else : endif;


                            wp_reset_query(); ?>

                        </ul>
                        <div class="paging">
                            <?php
                            if (function_exists(custom_pagination)) {
                                custom_pagination($the_query->max_num_pages,"",$paged);
                            }
                            ?>
                          <!--  <span class="caption">Показано 5 из 14</span> -->
                        </div>

                      <?php /*Выводдим попапы */ $search->tplRentPop($rent); ?>
                    </div>
                    <aside class="sidebar">
                        <?php

                        $search->GetCount();
                        $search->tplSearchForm();
                        ?>
                    </aside>


                </div>
            </div>
        </section>



        <?php tplFooter(); ?>
    </div>


<?php get_footer(); ?>