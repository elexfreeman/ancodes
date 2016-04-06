
<?php
$mices=Array();

$args = array( 'post_type' => 'mice', 'post_status' => 'publish','orderby' => 'menu_order title'  );
$the_query = new WP_Query( $args );
$exc_i=0;
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();
    $mice= new stdClass();
    $mice->id=$exc_i;
    $mice->title=get_the_title();
    $mice->mice_content=get_field('mice_content');
    $mice->mice_column=get_field('mice_column');
    $mice->show_in_main=get_field('show_in_main');
    $mices[]=$mice;
    $exc_i++;


endwhile; else : endif; wp_reset_query();
?>

<div class="promo-box box2">
    <h3>Деловой туризм MICE</h3>
    <div class="two-columns">
        <ul>
            <?php
                foreach($mices as $mice)
                {

                if($mice->mice_column=='В левую')
                {
                    if($mice->show_in_main[0]=='Да')
                    {
                       ?>
                        <li><a href="#mice<?php echo $mice->id; ?>" class="popup-btn2"><?php echo $mice->title;?></a></li>
                        <?php
                    }
                    ?>

                    <div class="info-popup custom-popup" id="mice<?php echo $mice->id; ?>">
                        <div class="title-holder MICE">
                            <h2>Деловой туризм MICE</h2>
                        </div>
                        <div class="popup-content">
                            <div class="wrap">
                                <div class="section">
                                    <h5>Разделы справочника</h5>
                                    <ul class="section-list">
                                        <?php  foreach($mices as $mice_menu)
                                        {
                                          ?>
                                            <li <?php if($mice_menu->title==$mice->title) echo  'class="active"';?>>
                                                <a class="popup-btn2" href="#mice<?php echo $mice_menu->id; ?>"><span><?php echo $mice_menu->title; ?></span></a>
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
                                    <h5><?php echo $mice->title;?></h5>
                                    <!--
                                    <ul class="images">
                                        <li><img src="images/img67.jpg" alt="" width="163" height="83"></li>
                                        <li><img src="images/img68.jpg" height="83" width="163" alt=""></li>
                                        <li><img src="images/img69.jpg" height="83" width="163" alt=""></li>
                                    </ul>
                                    -->
                                    <p><?php echo $mice->mice_content;?></p>
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
            foreach($mices as $mice)
            {
                if($mice->mice_column=='В правую')
                {
                    if($mice->show_in_main[0]=='Да')
                    {
                        ?>
                        <li><a href="#mice<?php echo $mice->id; ?>" class="popup-btn2"><?php echo $mice->title;?></a></li>
                        <?php
                    }
                    ?>


                    <div class="info-popup custom-popup" id="mice<?php echo $mice->id; ?>">
                        <div class="title-holder MICE">
                            <h2>Деловой туризм MICE</h2>
                        </div>
                        <div class="popup-content">
                            <div class="wrap">
                                <div class="section">
                                    <h5>Разделы справочника</h5>
                                    <ul class="section-list">
                                        <?php  foreach($mices as $mice_menu)
                                        {
                                            ?>
                                            <li <?php if($mice_menu->title==$mice->title) echo  'class="active"';?>>
                                                <a  class="popup-btn2" href="#mice<?php echo $mice_menu->id; ?>">
                                                    <span><?php echo $mice_menu->title; ?></span>
                                                </a>
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
                                    <h5><?php echo $mice->title;?></h5>
                                    <!--
                                    <ul class="images">
                                        <li><img src="images/img67.jpg" alt="" width="163" height="83"></li>
                                        <li><img src="images/img68.jpg" height="83" width="163" alt=""></li>
                                        <li><img src="images/img69.jpg" height="83" width="163" alt=""></li>
                                    </ul>
                                    -->
                                    <p><?php echo $mice->mice_content;?></p>
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
    <a href="#leave-order" class="application popup-btn2"><span>Оставить заявку</span></a>
</div>