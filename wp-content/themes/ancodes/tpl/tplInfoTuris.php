<?php
$info_turists=Array();
$args = array( 'post_type' => 'info_turist', 'post_status' => 'publish' ,'orderby' => 'menu_order title' );
$the_query = new WP_Query( $args );
$exc_i=0;
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();

    $info_turist = new stdClass();
    $info_turist->id=get_the_ID();
    $info_turist->title=get_the_title();
    $info_turist->exc_t_column=get_field('exc_t_column');
    $info_turist->s_content=get_field('s_content');
    $info_turist->s_gallery=get_field('s_gallery');
    $info_turist->show_in_main=get_field('show_in_main');
    $info_turists[]=$info_turist;
    $exc_i++;

endwhile; else : endif; wp_reset_query();
?>

<div class="promo-box box3">
    <h3>Справочник туриста</h3>
    <div class="two-columns">
        <ul>
            <?php
                foreach($info_turists as $info_turist)
                {

                if($info_turist->exc_t_column=='В левую')
                {
                    if($info_turist->show_in_main[0]=='Да')
                    {
                        ?>
                        <li><a href="#info_turist<?php echo $info_turist->id; ?>" class="popup-btn2"><?php echo $info_turist->title;?></a></li>
                        <?php
                    }
                    ?>
                    <div class="info-popup custom-popup" id="exct<?php echo $info_turist->id; ?>">
                        <div class="title-holder">
                            <h2>Справочник туриста</h2>
                        </div>
                        <div class="popup-content">
                            <div class="wrap">
                                <div class="section">
                                    <h5>Разделы справочника</h5>
                                    <ul class="section-list">
                                        <?php  foreach($info_turists as $info_turist_menu)
                                        {
                                          ?>
                                            <li <?php if($info_turist_menu->title==$info_turist->title) echo  'class="active"';?>>
                                                <a class="popup-btn2" href="#info_turist<?php echo $info_turist_menu->id; ?>"><span><?php echo $info_turist_menu->title; ?></span></a>
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
                                    <h5><?php echo $info_turist->title;?></h5>
                                    <div class="modalContent">
                                    <?php
                                    if (count($info_turist->s_gallery)>0)
                                    {
                                        echo '<ul class="images">';
                                        foreach ($info_turist->s_gallery as $img)
                                        {
                                            ?>
                                            <li><img src="<?php echo $img['url']; ?>" alt="" width="163" height="83"></li>
                                            <?php
                                        }
                                        echo '</ul>';
                                    }
                                    ?>
                                    <p><?php echo $info_turist->s_content;?></p>
                                  </div>
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
            foreach($info_turists as $info_turist)
            {
                if($info_turist->exc_t_column=='В правую')
                {

                    if($info_turist->show_in_main[0]=='Да')
                    {
                        ?>
                        <li><a href="#info_turist<?php echo $info_turist->id; ?>" class="popup-btn2"><?php echo $info_turist->title;?></a></li>
                        <?php
                    }
                    ?>

                    <div class="info-popup custom-popup" id="info_turist<?php echo $info_turist->id; ?>">
                        <div class="title-holder">
                            <h2>Справочник туриста</h2>
                        </div>
                        <div class="popup-content">
                            <div class="wrap">
                                <div class="section">
                                    <h5>Разделы справочника</h5>
                                    <ul class="section-list">
                                        <?php  foreach($info_turists as $info_turist_menu)
                                        {
                                            ?>
                                            <li <?php if($info_turist_menu->title==$info_turist->title) echo  'class="active"';?>>
                                                <a  class="popup-btn2" href="#info_turist<?php echo $info_turist_menu->id; ?>"><span><?php echo $info_turist_menu->title; ?></span></a>
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
                                    <h5><?php echo $info_turist->title;?></h5>
                                    <div class="modalContent">
                                    <!--
                                    <ul class="images">
                                        <li><img src="images/img67.jpg" alt="" width="163" height="83"></li>
                                        <li><img src="images/img68.jpg" height="83" width="163" alt=""></li>
                                        <li><img src="images/img69.jpg" height="83" width="163" alt=""></li>
                                    </ul>
                                    -->
                                    <p><?php echo $info_turist->s_content;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:parent.$.fancybox.close();" class="close">Close me</a>
                    </div>
                    <?php
                }

                    ?>
                    <div class="info-popup custom-popup" id="info_turist<?php echo $info_turist->id; ?>">
                        <div class="title-holder">
                            <h2>Справочник туриста</h2>
                        </div>
                        <div class="popup-content">
                            <div class="wrap">
                                <div class="section">
                                    <h5>Разделы справочника</h5>
                                    <ul class="section-list">
                                        <?php  foreach($info_turists as $info_turist_menu)
                                        {
                                            ?>
                                            <li <?php if($info_turist_menu->title==$info_turist->title) echo  'class="active"';?>>
                                                <a  class="popup-btn2" href="#info_turist<?php echo $info_turist_menu->id; ?>"><span><?php echo $info_turist_menu->title; ?></span></a>
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
                                    <h5><?php echo $info_turist->title;?></h5>
                                    <div class="modalContent">
                                    <!--
                                    <ul class="images">
                                        <li><img src="images/img67.jpg" alt="" width="163" height="83"></li>
                                        <li><img src="images/img68.jpg" height="83" width="163" alt=""></li>
                                        <li><img src="images/img69.jpg" height="83" width="163" alt=""></li>
                                    </ul>
                                    -->
                                    <p><?php echo $info_turist->s_content;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:parent.$.fancybox.close();" class="close">Close me</a>
                    </div>
                    <?php
            }
            ?>
        </ul>
    </div>
    <a href="#info_turist0" class="see-more popup-btn2"><span>Смотреть весь справочник</span></a>
</div>