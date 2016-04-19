<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.04.2016
 * Time: 19:56
 * Поиск по справочнику
 */
class SearchInDirectory
{
    public function search()
    {
        if(isset($_GET['search_string']))
        {
            $args = array('posts_per_page' => 999, 'post_type' => 'info_turist',
                'post_status' => 'publish'
            ,'orderby' => 'menu_order title'
            , 'meta_query'	=> array(
            // 'relation'		=> 'AND',
            array(
                'key'	 	=> 's_content',
                'value'	  	=> $_GET['search_string'],
                'compare' 	=> 'LIKE',
            ),
            ));
            $the_query = new WP_Query( $args );
            if($the_query->found_posts>0)
            {
                ?>  <ul class="section-list"> <?php
                $exc_i=0;
                if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();
                    $exc_i++;
                    ?>
                    <li>
                        <a class="popup-btn2" href="#info_turist<?php the_ID() ?>" id="info_turist<?php the_ID() ?>">
                            <span><?php the_title(); ?></span>
                        </a>
                    </li>
                    <?php

                endwhile; else : endif; wp_reset_query();
                ?>  </ul> <?php
            }
            else{ echo " Похожих результатов не обнаруженно.";}

        }
        else
        {
            echo " Похожих результатов не обнаруженно.";

        }
    }

    public function GetLink()
    {
        /*Вставляем кнопку назад для поиска*/
        if(isset($_GET['search_string']))
        {
            ?>
            <a class='search-back application popup-btn2' href='#search'>Назад</a>

            <?php

        }
    }

}