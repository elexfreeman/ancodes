<?php get_header(); ?>
    <div class="page">
        <?php GetSinglePageHeader();?>

        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="content">
                        <div class="title">
                            <h2>Экскурсии</h2>
                        </div>
                        <ul class="tours-list">
<?php
$args = array('posts_per_page' => 10, 'post_type' => 'excurs', 'post_status' => 'publish');
$the_query = new WP_Query( $args );
$p_id=1;
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

<?php endwhile; else : endif; wp_reset_query(); ?>

                        </ul>

                            <?php
                            if (function_exists(custom_pagination)) {
                                custom_pagination($the_query->max_num_pages,"",$paged);
                            }
                            ?>
                            <!--  <span class="caption">Показано 5 из 14</span> -->


                        <!-- pagination -->
<!--
                        <div class="paging">
                            <ul class="paging-list">
                                <li class="disabled"><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                            <form action="#" class="caption">Показано <input type="text" class="text" value="5"> из 13</form>
                        </div>

                        -->
                    </div>
                    <aside class="sidebar">
                        <?php tplExForm(); ?>
                        <?php tplWeather(); ?>
                        <?php tplReviewsRight(); ?>
                    </aside>
                </div>
            </div>
        </section>


        <?php tplFooter(); ?>
    </div>




<?php get_footer(); ?>