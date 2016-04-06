<?php
$our_coords = Array();
$args = array('post_type' => 'our_coord', 'post_status' => 'publish', 'orderby' => 'menu_order title');
$the_query = new WP_Query($args);
$exc_i = 0;
if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post();

    $our_coord = new stdClass();
    $our_coord->id = $exc_i;
    $our_coord->title = get_the_title();
    $our_coord->cor_city = get_field('cor_city');
    $our_coord->cor_address = get_field('cor_address');
    $our_coord->cor_phone1 = get_field('cor_phone1');
    $our_coord->cor_phone2 = get_field('cor_phone2');
    $our_coord->cor_fax = get_field('cor_fax');
    $our_coord->cor_skype = get_field('cor_skype');
    $our_coord->cor_icq = get_field('cor_icq');
    $our_coords[] = $our_coord;
    $exc_i++;

endwhile;
else : endif;
wp_reset_query();
?>

<div class="coordinates">
    <h3>Наши координаты</h3>
    <ul class="coordinates-list">
        <?php
        foreach ($our_coords as $our_coord) {
            ?>
            <li>
                <h4><?php echo $our_coord->cor_city; ?></h4>

                <p><?php echo $our_coord->cor_address; ?></p>
                <dl>
                    <?php
                    if ($our_coord->cor_phone1 != '') {
                        ?>
                        <dt>Телефон</dt>
                        <dd><span><?php echo $our_coord->cor_phone1 ?></span></dd>
                        <?php
                    }
                    if ($our_coord->cor_phone2 != '') {
                        ?>
                        <dt>Телефон</dt>
                        <dd><span><?php echo $our_coord->cor_phone2 ?></span></dd>
                        <?php
                    }
                    if ($our_coord->cor_skype != '') {
                        ?>
                        <dt>Skype</dt>
                        <dd><span><?php echo $our_coord->cor_skype ?></span></dd>
                        <?php
                    }
                    if ($our_coord->cor_icq != '') {
                        ?>
                        <dt>ICQ</dt>
                        <dd><span><?php echo $our_coord->cor_icq ?></span></dd>
                        <?php
                    }
                    if ($our_coord->cor_fax != '') {
                        ?>
                        <dt>Факс</dt>
                        <dd><span><?php echo $our_coord->cor_fax ?></span></dd>
                        <?php
                    }
                    ?>

                </dl>
            </li>
            <?php
        }
        ?>
        <!--
                <li>
                    <h4>Офис в<strong> Льорет де Мар</strong></h4>
                    <p>17310, Carretera Vila de Blanes 60, 2-a planta, oficina 1, LLoret de Mar, Gerona</p>
                    <dl>
                        <dt>Телефон</dt>
                        <dd><span>+34 (972) 36-08-52</span></dd>
                        <dt>Телефон</dt>
                        <dd><span>+34 (972) 36-07-01</span></dd>
                        <dt>Факс</dt>
                        <dd><span>+34 (972) 36-08-53</span></dd>
                    </dl>
                </li>
                -->
    </ul>
</div>