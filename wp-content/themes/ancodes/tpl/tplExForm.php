<?php
$ex = new ExSearch();

?>
<form id="ExForm" class="filter-form2">
    <input type="hidden" name="action" value="ExSearch">
    <h3>Тип экскурсий</h3>
<pre style="display: none">
    <?php
    $args = array('posts_per_page' => 3, 'post_type' => 'excurs', 'post_status' => 'publish' , 'limit' => 1);
    $the_query = new WP_Query( $args );
    $p_id=1;
    if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php
        $key = 'ex_city';
        $field = get_field_object($key);
        if(isset($field['choices'])) $choices=$field['choices'];
    endwhile; else : endif; wp_reset_query(); ?>


</pre>
    <div class="row slide-holder">
        <a href="#" class="opener">Тип экскурсий</a>
        <div class="slide">
            <ul class="radio-list">
                <li>
                    <input type="radio" value="1" class="radio ex_click" name="ex_type" id="ex_type_0">
                    <label for="ex_type_0">все <span><?php echo $ex->total(); ?></span></label>
                </li>
                <li>
                    <input type="radio" value="групповая" class="radio ex_click" name="ex_type" id="ex_type_1">
                    <label for="ex_type_1">групповые <span><?php echo $ex->GetFieldCount('ex_type','групповая'); ?></span></label>
                </li>
                <li>
                    <input type="radio" value="индивидуальная" class="radio ex_click" name="ex_type" id="ex_type_2">
                    <label for="ex_type_2">индивидуальные <span><?php echo $ex->GetFieldCount('ex_type','индивидуальная'); ?></span></label>
                </li>
            </ul>
        </div>
    </div>
    <div class="row slide-holder">
        <a href="#" class="opener">Города и курорты</a>
        <div class="slide">
            <div class="form-box">
                <ul class="check-list">
                    <?php
                    $i=1;
                    foreach ($choices as $key => $value)
                    {
                        if(($i % 2) == 0)
                        {
                            ?>
                            <li>
                                <input type="checkbox" class="checkbox ex_click" value="<?php echo $key; ?>"
                                       id="ex_city_<?php echo $i; ?>" name="ex_city_<?php echo $i; ?>">
                                <label for="ex_city_<?php echo $i; ?>"><?php echo $key; ?>
                                    <span><?php echo $ex->GetFieldCount('ex_city',$key); ?></span></label>
                            </li>
                            <?php
                        }
                            $i++;
                    }
                    ?>
                </ul>
            </div>
            <div class="form-box">
                <ul class="check-list">
                    <?php
                    $i=1;

                    foreach ($choices as $key => $value)
                    {
                        if(($i % 2) !=0)
                        {
                            ?>
                            <li>
                                <input type="checkbox" class="checkbox ex_click" value="<?php echo $key; ?>"
                                       id="ex_city_<?php echo $i; ?>" name="ex_city_<?php echo $i; ?>">
                                <label for="ex_city_<?php echo $i; ?>"><?php echo $key; ?>
                                    <span><?php echo $ex->GetFieldCount('ex_city',$key); ?></span></label>
                            </li>
                            <?php
                        }
                        $i++;
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</form>