<?php
/**
 * Created by PhpStorm.
 * User: folle
 * Date: 29.01.2016
 * Time: 13:54
 * список избранного
 */
$p_id=1;
$p_count=0;
$f_list=$this->GetList();

foreach($f_list as $favorit)
{
    if($favorit!=null) {
        $p_id++;

        ?>
        <li>
            <a href="#apartments-popup<?php echo $p_id; ?>" data-fancybox-group="apartments-gallery"
               class="apartments-popup-link">
                <div class="heading">
                    <span class="type"><?php echo $favorit->rent_type; ?> </span>
                    <span class="star chosen">*</span>
                    <span class="location"><?php echo $favorit->the_title; ?></span>
                </div>
                <!-- <span class="seller">Локация <?php echo $favoritrent_company; ?></span>-->

                <div class="info-holder">
                    <div class="image"><img src="<?php echo $favorit->r_img['sizes']['large']; ?>" alt="#" width="120"
                                            height="80"/>
                    </div>
                    <div class="text-holder">
                        <span>Площадь <?php echo $favorit->square; ?>м&sup2;</span>
                        <span><?php

                            if($favorit->rooms==1) echo  $favorit->rooms. ' спальня';
                            if($favorit->roomsms==2) echo  $favorit->rooms. ' спальни';
                            if($favorit->rooms==3) echo  $favorit->rooms. ' спальни';
                            if($favorit->rooms==4) echo  $favorit->rooms. ' спальни';
                            if($favorit->rooms>4) echo  $favorit->rooms. ' спален';
                            ?></span>

                        <div class="price">
                            <span>цена, &euro; за неделю</span>
                            <span class="sum"><?php echo $favorit->r_price; ?></span>
                        </div>
                    </div>
                </div>
                <?php
                $r_hot = $favorit->r_hot;
                if ($r_hot[0] == 'Горячее предложние') {
                    ?>
                    <span class="marker"></span>
                    <?php
                }
                ?>

            </a>
        </li>
        <?php
    }
}


$search = new RentaSearch();
/*Выводдим попапы */ $search->tplRentPop($f_list);