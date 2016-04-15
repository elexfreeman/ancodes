<?php get_header(); ?>



    <div class="page">
        <?php GetSinglePageHeader();?>
        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="content">
                        <div class="title">
                            <h2>Города и курорты</h2>
                        </div>
                        <ul class="cities-gallery photo-gallery">
                            <?php

                            $cities=Array();
                            $args = array( 'post_type' => 'cities', 'post_status' => 'publish');
                            $the_query = new WP_Query( $args );
                            //загоняем все города в массив
                            if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();

                                $city = new stdClass();
                                $city->title=get_the_title();
                                $city->c_photo=get_field('c_photo');
                                $city->s_curorts=Array();

                                $city->s_about=get_field('s_about');
                                $city->s_gallery=get_field('s_gallery');
                                $city->s_curorts_field=get_field('s_curorts');
                                $cities[]=$city;
                                endwhile; else : endif; wp_reset_query();


                            //теперь
                                //теперь все выводим
                            $i=0;
                            foreach($cities as $city )
                            {
                                $i++;
                            ?>
                                <li>
                                    <a href="#cities-popup<?php echo $i; ?>" class="cities-popup-link" data-fancybox-group="resorts-rallery">
                                        <div class="image">
                                            <img src="<?php echo $city->c_photo['sizes']['large']; ?>" alt="" width="310" height="200">
                                        </div>
                                        <div class="mask">
                                            <div class="holder">
                                                <div class="frame">
                                                    <strong class="title"><?php echo $city->title; ?></strong>
                                                    <span><?php echo GetCurortsCount($city->s_curorts_field); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php

$i=0;
foreach($cities as $city ) {
    $i++;
    ?>
    <div class="photo-gallery-popup cities-popup" id="cities-popup<?php echo $i; ?>" title="<?php the_title(); ?>">
        <span class="prev-text"></span>
        <span class="next-text"></span>

        <div class="city-info">
            <div class="main-city-info main-city-info<?php echo $i ?>">
                <h2><?php echo $city->title; ?></h2>

                <div class="resorts-nav">
                    <h3>Города <sup class="num"><?php echo count($city->s_curorts_field); ?></sup></h3>
                    <ul class="resorts-list">
                        <?php
                        $j = 0;
                        foreach ($city->s_curorts_field as $curort) {
                            $j++;
                            $curort = GetCurortInfo($curort->ID)
                            ?>
                            <li><a onclick="javascript: show_me('<?php echo $i; ?>','<?php echo $j; ?>');"
                                   class="resort-link0<?php echo $i . $j; ?>"><?php echo $curort->title; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="description-block">
                    <h3>О курорте</h3>
                    <ul class="photos-list">
                        <?php
                        foreach ($city->s_gallery as $img) {

                            ?>
                            <li>
                                <div class="image">
                                    <a class="singlegal<?php echo $i; ?>" rel="2" href="<?php echo $img['url']; ?>">
                                        <img src="<?php echo $img['url']; ?>" alt="" width="206">
                                    </a>
                                </div>
                            </li>

                            <?php
                        }
                        ?>
                        <script>
                            $(document).ready(function() {
                                $(".singlegal<?php echo $i ; ?>").fancybox({
                                    openEffect	: 'none',
                                    closeEffect	: 'none'
                                });
                            });
                        </script>
                    </ul>
                    <?php echo $city->s_about; ?>
                </div>
            </div>
            <?php
            $j = 0;
            foreach ($city->s_curorts_field as $curort) {
                $j++;
                $curort = GetCurortInfo($curort->ID)
                ?>
                <div class="resort-info rr-i-<?php echo $i; ?> resort<?php echo $i . $j; ?>">
                    <ul class="title-breadcrumbs">
                        <li><a onclick="javascript: show_me('all','<?php echo $i; ?>');" class="main-link"><?php echo $city->title; ?></a>
                        </li>
                        <li class="popup-holder">
                            <span><?php echo $curort->title; ?></span>
                            <a href="#" class="open">nav</a>

                            <div class="popup">
                                <ul>
                                    <?php
                                    $jj = 0;
                                    foreach ($city->s_curorts_field as $curort2) {
                                        $jj++;
                                        $curort2 = GetCurortInfo($curort2->ID)
                                        ?>
                                        <li>
                                            <a onclick="javascript: show_me('<?php echo $i; ?>','<?php echo $jj; ?>');"
                                               class="resort-link<?php echo $i . $jj; ?>">
                                                <?php echo $curort2->title; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <div class="text-block">
                        <h3>О городе</h3>
                        <ul class="photos-list">
                            <?php
                            foreach ($curort->c_gallery as $img) {
                                ?>
                                <li>
                                    <div class="image">
                                        <a class="singlegal<?php echo $i . $j; ?>" rel="2" href="<?php echo $img['url']; ?>">
                                            <img src="<?php echo $img['url']; ?>" alt="" width="206" height="105">
                                        </a>
                                    </div>
                                </li>

                                <?php
                            }
                            ?>
                            <script>
                                $(document).ready(function() {
                                    console.info('dd<?php echo $i . $j; ?>');
                                    $(".singlegal<?php echo $i . $j; ?>").fancybox({
                                        openEffect	: 'none',
                                        closeEffect	: 'none'
                                    });
                                });
                            </script>
                        </ul>
                        <?php echo $curort->c_description; ?>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <?php
}
    ?>
                    <aside class="sidebar">
                        <?php tplWeather(); ?>
                        <?php tplReviewsRight(); ?>
                    </aside>
                </div>
            </div>
        </section>
        <?php tplFooter(); ?>
    </div>
<?php get_footer(); ?>