<?php get_header(); ?>
<?php $search = new RentaSearch(); ?>
    <div class="page">

        <header class="header">
            <div class="main-slider">
                <div class="tp-banner-container">
                    <div class="tp-banner" >
                        <?php putRevSlider("slider1"); ?>
                       <!--
                        <ul>
                            <?php
                            $args = array('posts_per_page' => 30, 'post_type' => 'main_page_baner', 'post_status' => 'publish');
                            $the_query = new WP_Query( $args );
                            if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <?php $img = get_field('min_img');?>

                                <li data-transition="fadefromright" data-slotamount="5" data-masterspeed="700" >

                                    <img src="<?php echo $img['url']; ?>"  alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                                </li>
                            <?php endwhile; else : endif; wp_reset_query(); ?>
                        </ul>
                       -->
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <strong class="logo">
                    <a href="/">Ancodes<span class="sticker">
                            <img src="images/img01.png" alt="#" width="88" height="89" /></span></a>
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

                       <!--  <a href="/sitemap/" class="site-map"><span>Карта сайта</span></a> -->
                        <?php tplSignIn(); ?>
                        <span id="f_link"><?php $ff = new Favorites();$ff->UpdateMenu(); ?></span>

                    </div>
                </div>
                <?php tplNavLine(); ?>
                <!--
                <div class="promo">
                    <h2>Детские лагеря</h2>
                    <ul class="promo-list">
                        <li class="item1">
                            <span class="title">Лагерь Остров мечты</span>
                            <a href="#" class="more">read more</a>
                            <span class="price">от 47 120.</span>
                        </li>
                        <li class="item2">
                            <span class="title">Языковой лагерь Supercamp</span>
                            <a href="#" class="more">read more</a>
                            <span class="price">от 58 250.</span>
                        </li>
                        <li class="item3">
                            <span class="title">Языковой лагерь Cabopino</span>
                            <a href="#" class="more">read more</a>
                            <span class="price">от 78 380.</span>
                        </li>
                        <li class="item4">
                            <span class="title">Спортлагерь Amposte</span>
                            <a href="#" class="more">read more</a>
                            <span class="price">от 105 400.</span>
                        </li>
                    </ul>
                </div>
                -->
            </div>
        </header>
        <section class="main">
            <div class="wrapper">
                <div class="reservation">
                    <div class="client">
                        <h3>Онлайн бронирование</h3>
                        <ul class="reservation-list list-type">
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
                <div class="main-holder">
                    <div class="content">
                        <div class="title">

                        <?php
                        $args = array('posts_per_page' => 300,
                            'post_type' => 'rent_house',
                            'post_status' => 'publish',
                         'meta_query'	=> array(
                            array(
                                'key'	  	=> 'show_in_main',
                                'value'	  	=> 'да',
                                'compare' 	=> '=',
                            )

                        )
                        );
                        $the_query = new WP_Query( $args );
                        $p_id=1;
                        $p_count=0;
                        if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php  $p_count++;?>
                        <?php endwhile; else : endif; wp_reset_query(); ?>
                            <a href="/rent/" class="see-all">Все </a>
                            <h2>Аренда домов, вилл и апартаментов</h2>
                        </div>
                        <ul class="apartments-list">
                            <?php
                            $args = array('posts_per_page' => 300, 'post_type' => 'rent_house', 'post_status' => 'publish');
                            $the_query = new WP_Query( $args );
                            $p_id=0;
                            $p_count=0;
                            $rent = Array();
                            if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <?php
                                $p_count++;$p_id++;
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

                                $mainimg = get_field('r_img'); $p_count++;
                                $show_in_main=get_field('show_in_main');
                                if($show_in_main[0]=='Да')
                                {
                                    ?>

                                    <li>
                                        <a href="#apartments-popup<?php echo $p_id; ?>"
                                           data-fancybox-group="apartments-gallery"
                                           class="apartments-popup-link">
                                            <div class="heading">
                                                <span class="type"> </span>
                                                <?php
                                                $ff = new Favorites();
                                                if ($ff->IsIn(get_the_ID())) {
                                                    ?>
                                                    <span class="star chosen f_<?php the_ID(); ?>"
                                                          onclick="Favorites.Delete(<?php the_ID(); ?>)">*</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="star f_<?php the_ID(); ?>"
                                                          onclick="Favorites.Add(<?php the_ID(); ?>)">*</span>
                                                    <?php
                                                }
                                                ?>

                                                    <span
                                                        class="location"><?php the_field("rent_type"); ?> <?php the_title(); ?></span>

                                            </div>
                                            <!--<span class="seller">Локация <?php the_field("rent_company"); ?></span> -->
                                            <div class="info-holder">

                                                <div class="image">
                                                    <img src="<?php echo $mainimg['sizes']['large']; ?>" alt="#"
                                                         width="120" height="80"/></div>

                                                <div class="text-holder">
                                                    <span>Площадь <?php the_field("square"); ?>м&sup2;</span>
                                                    <span><?php

                                                        if($r_page->rooms==1) echo  $r_page->rooms. ' спальня';
                                                        if($r_page->roomsms==2) echo  $r_page->rooms. ' спальни';
                                                        if($r_page->rooms==3) echo  $r_page->rooms. ' спальни';
                                                        if($r_page->rooms==4) echo  $r_page->rooms. ' спальни';
                                                        if($r_page->rooms>4) echo  $r_page->rooms. ' спален';
                                                         ?></span>

                                                    <div class="price">
                                                        <span>цена, &euro; в месяц</span>
                                                        <span class="sum"><?php the_field("r_price"); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                <?php
                                }
                                endwhile; else : endif; wp_reset_query(); ?>

                        </ul>
                       <?php tplExcTours(); ?>
                       <?php tplMICE(); ?>
                       <?php tplInfoTurist(); ?>


                    </div>
                    <aside class="sidebar">

                        <?php tplNewsRight(); ?>
                        <?php tplWeather(); ?>
                        <?php tplReviewsRight(); ?>
                    </aside>
                </div>
            </div>
        </section>
        <?php tplFooter(); ?>
    </div>
<?php /*Выводдим попапы */ $search->tplRentPop($rent); ?>
    <div class="order-popup custom-popup" id="leave-order">
        <div class="title-holder">
            <h2>Оставить заявку</h2>
        </div>
        <form action="#" class="feedback-form">
            <fieldset>
                <p class="info-text"></p>
                <input type="text" class="text" placeholder="Ваше имя">
                <input type="text" class="text" placeholder="Ваша электронная почта">
                <select class="feedback-theme" data-jcf='{"wrapNative": false}'>
                    <option class="hideme">Тема заявки</option>
                    <option>Тема 1</option>
                    <option>Тема 2</option>
                </select>
                <textarea class="text textarea" placeholder="Примечание"></textarea>
                <div class="submit-row">
                    <input type="submit" class="submit" value="Отправить">
                    <p>Наши операторы отвечают на каждое сообщение в течении 5 часов с момента получения.</p>
                </div>
            </fieldset>
        </form>
        <a href="javascript:parent.$.fancybox.close();" class="close">Close me</a>
    </div>


    <div class="order-popup custom-popup" id="leave-order2">
        <div class="title-holder" style="background: url('/images/bg-promo02.png') no-repeat;background-size: 100%;">
            <h2>Оставить заявку</h2>
        </div>
        <form action="#" class="feedback-form">
            <fieldset>
                <p class="info-text"></p>
                <input type="text" class="text" placeholder="Ваше имя">
                <input type="text" class="text" placeholder="Ваша электронная почта">
                <select class="feedback-theme" data-jcf='{"wrapNative": false}'>
                    <option class="hideme">Тема заявки</option>
                    <option>Тема 1</option>
                    <option>Тема 2</option>
                </select>
                <textarea class="text textarea" placeholder="Примечание"></textarea>
                <div class="submit-row">
                    <input type="submit" class="submit" value="Отправить">
                    <p>Наши операторы отвечают на каждое сообщение в течении 5 часов с момента получения.</p>
                </div>
            </fieldset>
        </form>
        <a href="javascript:parent.$.fancybox.close();" class="close">Close me</a>
    </div>

    <div class="info-popup custom-popup" id="info-popup">
        <div class="title-holder">
            <h2>Справочник туриста</h2>
        </div>
        <div class="popup-content">
            <p>Туризм — временные выезды (путешествия) людей в другую страну или местность, отличную от места постоянного жительства на срок от 24 часов до 6 месяцев в течение одного календарного года или с совершением не менее одной ночевки в развлекательных, оздоровительных, спортивных, гостевых, познавательных, религиозных и иных целях без занятия деятельностью, оплачиваемой из местного источника.</p><br/>
            <div class="wrap">
                <div class="section">
                    <h5>Разделы справочника</h5>
                    <ul class="section-list">
                        <li class="active"><a href="#"><span>История туризма</span></a></li>
                        <li><a href="#"><span>Прохождение таможенного контроля</span></a></li>
                        <li><a href="#"><span>Смехы метро Испании</span></a></li>
                        <li><a href="#"><span>Безопасность туриста</span></a></li>
                        <li><a href="#"><span>Таблица сезонов отдыха</span></a></li>
                        <li><a href="#"><span>Правила выезда ребенка</span></a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <form action="#" class="quick-search">
                        <label>Быстрый поиск по справочнику</label>
                        <input type="text" class="text" placeholder="Что ищем?">
                    </form>
                    <h5>История туризма</h5>
                    <p>С древнейших времен множество людей отправлялись в путешествия с целью познания мира и открытия новых территорий, с торговыми, дипломатическими, военными, религиозными и иными миссиями.</p>
                    <ul class="images">
                        <li><img src="images/img67.jpg" alt="" width="163" height="83"></li>
                        <li><img src="images/img68.jpg" height="83" width="163" alt=""></li>
                        <li><img src="images/img69.jpg" height="83" width="163" alt=""></li>
                    </ul>
                    <p>Паломники, идущие в Рим на празднование 1300 года. В античные времена основными мотивами путешествий были торговля, образование, паломничество, лечение. В Древней Греции зародились и спортивные поездки (Олимпийские игры). Развитие торговли привело к массовому строительству дорог, постоялых дворов, таверн. Некоторые постоялые дворы по роскоши не отличались от домов богатых людей. Римская аристократия активно участвовала в рекреационных путешествиях — на свои виллы, к морю, в горы.</p>
                    <p>На востоке в древности путешествовали караванами на верблюдах. Ночевали в шатрах или в караван-сараях (постоялый двор с загоном для животных). Уровень обслуживания был намного выше, чем в Европе из-за более активной торговли.</p>
                    <p>В средние века среди путешествий усилился религиозный фактор — огромные массы людей устремлялись к христианским и мусульманским святыням. И только эпоха Ренессанса ослабила религиозные мотивы и </p>
                </div>
            </div>
        </div>
        <a href="javascript:parent.$.fancybox.close();" class="close">Close me</a>
    </div>


<?php get_footer(); ?>