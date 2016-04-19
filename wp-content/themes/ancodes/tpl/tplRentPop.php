<div id="tplSearchModalMox">
    <?php
    /* $args = array('posts_per_page' => 300, 'post_type' => 'rent_house', 'post_status' => 'publish');
     $the_query = new WP_Query( $args );*/
    /* $p_count=0;*/
    //собираем массив с данными
    /* $data['rent'] = Array();
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
         $r_page->r_other=get_field('other');
         $r_page->r_place=get_field('r_place');
         $r_page->r_city=get_field('r_city');
         $r_page->r_customplace=get_field('r_customplace');
         $r_page->r_customplace=get_field('r_customplace');
         $r_page->r_beach_length=get_field('r_beach_length');
         $p_count++;
         $data['rent'][]=$r_page;


     endwhile; else : endif; wp_reset_query();
     */
    $p_id=0;
    foreach ($data['rent'] as $r)
    {
        if($p_id==count($data['rent'])-1)//последний
        {
            $prev=$data['rent'][0];
            $next=$data['rent'][count($data['rent'])-2];
        }
        elseif($p_id==0)//если первый
        {
            $prev=$data['rent'][count($data['rent'])-1];
            $next=$data['rent'][1];
        }
        else
        {
            $prev=$data['rent'][$p_id-1];
            $next=$data['rent'][$p_id+1];
        }

        $mainimg = $r->r_img;
        $r_params=  $r->r_params;
        $p_id++;?>

        <div class="photo-gallery-popup apartments-popup" id="apartments-popup<?php echo $p_id; ?>" title="Вилла">
            <span class="prev-text"><?php echo $prev->the_title; ?><br/><?php  echo $prev->r_price; ?>.</span>
            <span class="next-text"><?php echo $next->the_title; ?><br/><?php  echo $next->r_price; ?>.</span>
            <div class="title-wrap">
                <h2><?php  echo $r->rent_type; ?> <span><?php  echo $r->the_title; ?></span>
                    <?php
                    $ff = new Favorites();
                    if($ff->IsIn(get_the_ID()))
                    {
                        ?>
                        <div class="star chosen f_<?php echo $r->id; ?>" onclick="Favorites.Delete(<?php echo $r->id; ?>)"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="star f_<?php echo $r->id; ?>" onclick="Favorites.Add(<?php echo $r->id; ?>)"></div>
                        <?php
                    }
                    ?>
                </h2>
                <span class="rent">Локация <span class="Hb"><?php   if($r->r_place=='new') echo $r->r_customplace; else
                    {
                        $r->r_city=explode('/',urldecode($r->r_city));

                    }
                        echo $r->r_city[count($r->r_city)-2]; ?></span></span>
            </div>
            <div class="wrap">
                <div class="parameters">
                    <h3>Параметры</h3>

                    <ul class="parameters-list">
                        <!-- <li <?php if(in_array('Домашние животные',$r_params)) echo ' class="staffed"'; ?>>Домашние животные</li> -->
                        <li <?php if(in_array('Телевизор',$r_params)) echo ' class="staffed"'; ?>>Телевизор</li>
                        <li <?php if(in_array('Стиральная машина',$r_params)) echo ' class="staffed"'; ?>>Стиральная машина</li>
                        <li <?php if(in_array('Посудомоечная машина',$r_params)) echo ' class="staffed"'; ?>>Посудомоечная машина</li>
                        <li <?php if(in_array('Микроволновая печь',$r_params)) echo ' class="staffed"'; ?>>Микроволновая печь</li>
                        <li <?php if(in_array('Кондиционер',$r_params)) echo ' class="staffed"'; ?>>Кондиционер</li>
                        <li <?php if(in_array('Интернет',$r_params)) echo ' class="staffed"'; ?>>Интернет</li>
                        <li <?php if(in_array('Балкон/Терраса',$r_params)) echo ' class="staffed"'; ?>>Балкон/Терраса</li>
                        <li <?php if(in_array('Барбекю',$r_params)) echo ' class="staffed"'; ?>>Барбекю</li>
                        <li <?php if(in_array('Бассейн',$r_params)) echo ' class="staffed"'; ?>>Бассейн</li>

                        <li <?php if(in_array('Камин',$r_params)) echo ' class="staffed"'; ?>>Камин</li>
                        <li <?php if(in_array('Сауна',$r_params)) echo ' class="staffed"'; ?>>Сауна</li>
                        <li <?php if(in_array('Джакузи',$r_params)) echo ' class="staffed"'; ?>>Джакузи</li>
                        <li <?php if(in_array('Гараж/паркинг',$r_params)) echo ' class="staffed"'; ?>>Гараж / паркинг</li>
                        <li <?php if(in_array('Вид на море',$r_params)) echo ' class="staffed"'; ?>>Вид на море</li>
                    </ul>
                </div>
                <div class="about-info">
                    <h3>Об объекте</h3>
                    <ul class="numbers-list">
                        <li>
                            <span class="title">стоимость</span>
                            <span class="price"><?php  echo $r->r_price; ?></span>
                            <span class="value">&euro; в месяц</span>
                        </li>
                        <li>
                            <span class="title">площадь м<sup>2</sup></span>
                            <span class="number"><?php  echo $r->square; ?></span>
                        </li>
                        <li>
                            <span class="title">спальни</span>
                            <span class="number"><?php  echo $r->rooms; ?></span>
                        </li>
                    </ul>

                    <?php if($r->r_beach_length!='') {
                        if($r->r_beach_length=='m1000') $r->r_beach_length='более 1000';
                        ?>
                        <h4>Расстояние до пляжа: <?php echo $r->r_beach_length;  ?> м.</h4>
                    <?php }?>

                        <h4>Фотографии</h4>
                        <ul class="photo-list">
                            <?php
                            foreach($r->r_photos as $img)
                            {
                                ?>
                                <li>
                                    <a class="singlegal<?php echo $p_id; ?>" rel="<?php echo $p_id; ?>"
                                       href="<?php echo $img['sizes']['large']; ?>">
                                        <img src="<?php echo $img['sizes']['medium']; ?>"
                                                                                         height="105" width="206" alt="">
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <script>
                                $(document).ready(function() {
                                    $(".singlegal<?php echo $p_id; ?>").fancybox({
                                        openEffect	: 'none',
                                        closeEffect	: 'none'
                                    });
                                });
                            </script>
                        </ul>





                    <h4>Описание</h4>
                    <?php echo $r->r_descripton; ?><?php $r_other = $r->r_other;
                    if ($r_other) {
                        echo "<ul class=\"nobullets\">";
                        echo '<li><strong>Расстояние до пляжа:</strong> ' . $r->beach_length . '</li>';
                        foreach ($r_other as $other) {
                            echo '<li><strong>' . $other['pole'] . ' :</strong> ' . $other['znachenie'] . '</li>';
                        }
                        echo "</ul>";
                    } ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>