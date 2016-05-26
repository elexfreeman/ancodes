<?php get_header(); ?>
    <div class="page">
        <?php GetSinglePageHeader();?>
        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="loader"></div>
                    <div class="content">
                        <div class="title">
                            <h2>Избранное</h2>
                        </div>
                        <ul class="apartments-list">
                            <?php $f = new Favorites();$f->tplFavoritesList(); ?>
                        </ul>

                    </div>
                    <aside class="sidebar">
                        <?php
                        $s = new RentaSearch();
                      //  $s->GetCount();
                        $s->tplSearchForm();
                        ?>
                    </aside>
                </div>
            </div>
        </section>



        <?php tplFooter(); ?>
    </div>

<?php
$args = array('posts_per_page' => 300, 'post_type' => 'rent_house', 'post_status' => 'publish');
$the_query = new WP_Query( $args );

$p_count=0;
//собираем массив с данными
$rent = Array();
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();
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
    $p_count++;
$rent[]=$r_page;
endwhile; else : endif; wp_reset_query();
$p_id=0;
foreach ($rent as $r)
{
    if($p_id==count($rent)-1)//последний
    {
        $prev=$rent[0];
        $next=$rent[count($rent)-2];
    }
    elseif($p_id==0)//если первый
    {
        $prev=$rent[count($rent)-1];
        $next=$rent[1];
    }
    else
    {
        $prev=$rent[$p_id-1];
        $next=$rent[$p_id+1];
    }

    $mainimg = $r->r_img;
    $r_params=  $r->r_params;
    $p_id++;?>
    <div class="photo-gallery-popup apartments-popup" id="apartments-popup<?php echo $p_id; ?>" title="Вилла">
        <span class="prev-text"><?php echo $prev->the_title; ?><br/><?php  echo $prev->r_price; ?>.</span>
        <span class="next-text"><?php echo $next->the_title; ?><br/><?php  echo $next->r_price; ?>.</span>
        <div class="title-wrap">
            <h2><?php  echo $r->rent_type; ?>, <span><?php  echo $r->the_title; ?></span><div class="star"></div></h2>
            <span class="rent">Локация <?php  echo $r->rent_company; ?></span>
        </div>
        <div class="wrap">
            <div class="parameters">
                <h3>Параметры</h3>

                <ul class="parameters-list">
                    <li <?php if(in_array('Домашние животные',$r_params)) echo ' class="staffed"'; ?>>Домашние животные</li>
                    <li <?php if(in_array('ТВ',$r_params)) echo ' class="staffed"'; ?>>ТВ</li>
                    <li <?php if(in_array('Стиральная машина',$r_params)) echo ' class="staffed"'; ?>>Стиральная машина</li>
                    <li<?php if(in_array('Посудомоечная',$r_params)) echo ' class="staffed"'; ?>>Посудомоечная</li>
                    <li <?php if(in_array('Кондиционер',$r_params)) echo ' class="staffed"'; ?>>Кондиционер</li>
                    <li <?php if(in_array('Интернет',$r_params)) echo ' class="staffed"'; ?>>Интернет</li>
                    <li <?php if(in_array('Балкон/Терраса',$r_params)) echo ' class="staffed"'; ?>>Балкон/Терраса</li>
                    <li<?php if(in_array('Барбекю',$r_params)) echo ' class="staffed"'; ?>>Барбекю</li>
                    <li<?php if(in_array('Бассейн',$r_params)) echo ' class="staffed"'; ?>>Бассейн</li>
                    <li<?php if(in_array('Детский бассейн',$r_params)) echo ' class="staffed"'; ?>>Детский бассейн</li>
                    <li<?php if(in_array('Закрытый бассейн',$r_params)) echo ' class="staffed"'; ?>Закрытый бассейн</li>
                    <li<?php if(in_array('Камин',$r_params)) echo 'class="staffed"'; ?>>Камин</li>
                    <li<?php if(in_array('Сауна',$r_params)) echo 'class="staffed"'; ?>>Сауна</li>
                    <li<?php if(in_array('Джакузи',$r_params)) echo 'class="staffed"'; ?>>Джакузи</li>
                    <li<?php if(in_array('Парковочное место',$r_params)) echo 'class="staffed"'; ?>>Парковочное место</li>
                    <li<?php if(in_array('Подходит',$r_params)) echo 'class="staffed"'; ?>>Подходит</li>
                </ul>
            </div>
            <div class="about-info">
                <h3>О вилле</h3>
                <ul class="numbers-list">
                    <li>
                        <span class="title">стоимость</span>
                        <span class="price"><?php  echo $r->r_price; ?>.</span>
                        <span class="value">рублей в месяц</span>
                    </li>
                    <li>
                        <span class="title">площадь м<sup>2</sup></span>
                        <span class="number"><?php  echo $r->square; ?></span>
                    </li>
                    <li>
                        <span class="title">комнаты</span>
                        <span class="number"><?php  echo $r->rooms; ?></span>
                    </li>
                </ul>
                <h4>Фотографии</h4>
                <pre>
                    <?php
                    $r_photos = $r->r_photos;

                    ?>
                </pre>
                <ul class="photo-list">
                    <?php
                    foreach($r_photos as $img)
                    {
                        ?>
                        <li><a class="singlegal" rel="gallery1" href="<?php echo $img['sizes']['large']; ?>"><img src="<?php echo $img['sizes']['medium']; ?>" height="105" width="206" alt=""></a></li>
                        <?php
                    }
                    ?>

                </ul>
                <h4>Описание</h4>
                <?php  echo $r->r_descripton; ?><?php if(get_field('other')): ?>

	<ul>

	<?php while(has_sub_field('other')): ?>

		<li>sub_field_1 = <?php the_sub_field('pole'); ?>, sub_field_2 = <?php the_sub_field('znachenie'); ?>, etc</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>
            </div>
        </div>
    </div>
<?php
}
?>


<?php get_footer(); ?>