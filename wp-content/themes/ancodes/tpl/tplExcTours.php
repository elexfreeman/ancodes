
<?php
$exctours=Array();
$curort = new stdClass();
$args = array( 'post_type' => 'exct', 'post_status' => 'publish' ,'orderby' => 'menu_order title' );
$the_query = new WP_Query( $args );
$exc_i=0;
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();
    $column = get_field('exc_t_column');
    $exctour = new stdClass();
    $exctour->id=$exc_i;
    $exctour->title=get_the_title();
    $exctour->exc_t_column=get_field('exc_t_column');
    $exctour->exct_content=get_field('exct_content');
    $exctour->show_in_main=get_field('show_in_main');
    $exctours[]=$exctour;
    $exc_i++;
endwhile; else : endif; wp_reset_query();
?>

<div class="promo-box">
    <h3>Экскурсионные туры</h3>
    <div class="two-columns">
        <ul>
            <?php
                foreach($exctours as $exctour)
                {
                if($exctour->exc_t_column=='В левую')
                {
                    if($exctour->show_in_main[0]=='Да')
                    {
                        ?>
                        <li><a href="#exct<?php echo $exctour->id; ?>" class="popup-btn2"><?php echo $exctour->title;?></a></li>
                        <?php
                    }
                    ?>

                    <div class="info-popup custom-popup" id="exct<?php echo $exctour->id; ?>">
                        <div class="title-holder ex-tours">
                            <h2>Экскурсионные туры</h2>
                        </div>
                        <div class="popup-content">
                            <div class="wrap">
                                <div class="section">
                                    <h5>Разделы справочника</h5>
                                    <ul class="section-list">
                                        <?php  foreach($exctours as $exctour_menu)
                                        {
                                          ?>
                                            <li <?php if($exctour_menu->title==$exctour->title) echo  'class="active"';?>>
                                                <a class="popup-btn2" href="#exct<?php echo $exctour_menu->id; ?>"><span><?php echo $exctour_menu->title; ?></span></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <form action="#" class="quick-search">
                                        <label>Быстрый поиск по справочнику</label>
                                        <input type="text" class="text" placeholder="Что ищем?">
                                    </form>
                                    <h5><?php echo $exctour->title;?></h5>
                                    <!--
                                    <ul class="images">
                                        <li><img src="images/img67.jpg" alt="" width="163" height="83"></li>
                                        <li><img src="images/img68.jpg" height="83" width="163" alt=""></li>
                                        <li><img src="images/img69.jpg" height="83" width="163" alt=""></li>
                                    </ul>
                                    -->
                                    <p><?php echo $exctour->exct_content;?></p>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:parent.$.fancybox.close();" class="close">Close me</a>
                    </div>
                    <?php
                }
            }
            ?>

        </ul>
        <ul>
            <?php
            foreach($exctours as $exctour)
            {
                if($exctour->exc_t_column=='В правую')
                {
                    if($exctour->show_in_main[0]=='Да')
                    {
                        ?>
                        <li><a href="#exct<?php echo $exctour->id; ?>" class="popup-btn2"><?php echo $exctour->title;?></a></li>
                        <?php
                    }
                    ?>

                    <div class="info-popup custom-popup" id="exct<?php echo $exctour->id; ?>">
                        <div class="title-holder  ex-tours">
                            <h2>Экскурсионные туры</h2>
                        </div>
                        <div class="popup-content">
                            <div class="wrap">
                                <div class="section">
                                    <h5>Разделы справочника</h5>
                                    <ul class="section-list">
                                        <?php  foreach($exctours as $exctour_menu)
                                        {
                                            ?>
                                            <li <?php if($exctour_menu->title==$exctour->title) echo  'class="active"';?>>
                                                <a  class="popup-btn2" href="#exct<?php echo $exctour_menu->id; ?>"><span><?php echo $exctour_menu->title; ?></span></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <form action="#" class="quick-search">
                                        <label>Быстрый поиск по справочнику</label>
                                        <input type="text" class="text" placeholder="Что ищем?">
                                    </form>
                                    <h5><?php echo $exctour->title;?></h5>
                                    <!--
                                    <ul class="images">
                                        <li><img src="images/img67.jpg" alt="" width="163" height="83"></li>
                                        <li><img src="images/img68.jpg" height="83" width="163" alt=""></li>
                                        <li><img src="images/img69.jpg" height="83" width="163" alt=""></li>
                                    </ul>
                                    -->
                                    <p><?php echo $exctour->exct_content;?></p>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:parent.$.fancybox.close();" class="close">Close me</a>
                    </div>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
    <a href="#leave-order2" class="application popup-btn2"><span>Оставить заявку</span></a>
</div>