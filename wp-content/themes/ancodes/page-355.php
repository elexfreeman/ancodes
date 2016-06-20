<?php get_header(); ?>
<script>
    $(document).ready(function() {
        $("a").each(function(i){
            var names = $(this).attr("href");
            if (names != '#'){
                name = names.replace('#', "")
                $(this).attr("id", name+'1');
                //alert(name);
            }
        });


    });
</script>
    <div class="page">
        <?php GetSinglePageHeader();?>
        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="content">
                        <div class="title">
                            <h2>Новости</h2>
                        </div>
                        <ul class="news-block-list">
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
                            $p_id=1;
                            if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); 

$private = get_field('registered'); // read custom field
if ( isset($private) && $private == '1') { if ( is_user_logged_in() ) { ?>

                                <?php $mainimg = get_field('photo');?>
                                <li>
                                    <h3><?php the_title(); ?></h3>
                                    <span class="date"><?php echo NewsConvertDate(get_field( "date" )); ?></span>
                                    <div class="holder">
                                        <div class="image">
                                            <img src="<?php echo $mainimg['sizes']['large']; ?>" alt="#" width="176" style="height: auto;" />
                                        </div>
                                        <div class="text">
                                            <p><?php the_field( "short_anons" ); ?></p>
                                            <a href="#news-popup<?php echo $p_id;$p_id++;?>" class="read-more news-popup-link" data-fancybox-group="news-gallery"><span>Подробнее</span></a>
                                        </div>
                                    </div>
                                </li>

<?php } } else { ?>

                               <?php $mainimg = get_field('photo');?>
                                <li>
                                    <h3><?php the_title(); ?></h3>
                                    <span class="date"><?php echo NewsConvertDate(get_field( "date" )); ?></span>
                                    <div class="holder">
                                        <div class="image"><img src="<?php echo $mainimg['sizes']['large']; ?>" alt="#" width="176" style="height: auto;" /></div>
                                        <div class="text">
                                            <p><?php the_field( "short_anons" ); ?></p>
                                            <a href="#news-popup<?php echo get_the_ID();?>" class="read-more news-popup-link" data-fancybox-group="news-gallery"><span>Подробнее</span></a>
                                        </div>
                                    </div>
                                </li>

                            <?php } endwhile; else : endif; wp_reset_query(); ?>


                        </ul>
                    </div>
                    <aside class="sidebar">
                        <?php tplWeather(); ?>
                        <?php tplReviewsRight(); ?>
                    </aside>
                </div>
            </div>
        </section>
        <?php tplFooter(); ?>
    </div>

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
$p_id=1;
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); 
$private = get_field('registered'); // read custom field
if ( isset($private) && $private == '1') { if ( is_user_logged_in() ) { ?>


    <?php $mainimg = get_field('photo');?>

    <div class="photo-gallery-popup news-popup" id="news-popup<?php echo get_the_ID();?>" title="<?php the_title(); ?>">
        <span class="prev-text">предыдущая<br/>новость</span>
        <span class="next-text">следующая<br/>новость</span>
        <div class="title-wrap">
            <h2><?php the_title(); ?></h2>
            <div class="head-info">
                <span class="date"<?php echo NewsConvertDate(get_field( "date" )); ?></span>
                <span class="social-label">Социальные сети:</span>
                <?php social_likes( get_the_ID() ); ?>
            </div>
        </div>
        <div class="news-content">
            <p><?php the_field( "news_text" );?></p>
            <div class="image-center">
                <img src="<?php echo $mainimg['url']; ?>" width="882" alt="">
            </div>
        </div>
    </div>


<?php } } else { ?>


    <?php $mainimg = get_field('photo');?>

    <div class="photo-gallery-popup news-popup" id="news-popup<?php echo get_the_ID();?>" title="<?php the_title(); ?>">
        <span class="prev-text">предыдущая<br/>новость</span>
        <span class="next-text">следующая<br/>новость</span>
        <div class="title-wrap">
            <h2><?php the_title(); ?></h2>
            <div class="head-info">
                <span class="date"<?php echo NewsConvertDate(get_field( "date" )); ?></span>
                <span class="social-label">Социальные сети:</span>
                <?php social_likes( get_the_ID() ); ?>
            </div>
        </div>
        <div class="news-content">
            <p><?php the_field( "news_text" );?></p>



            <div class="image-center">
                <img src="<?php echo $mainimg['url']; ?>" width="882" alt="">
            </div>
        </div>
    </div>

<?php } endwhile; else : endif; wp_reset_query(); ?>



<?php get_footer(); ?>