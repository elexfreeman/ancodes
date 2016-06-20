<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 20.06.2016
 * Time: 9:16
 */
class SiteSearch
{

    function __construct()
    {

    }

    public function News($searchString,$sort='title')
    {
        $res=array();

        if($searchString!='')
        {


            $args = array('posts_per_page' => 100, 'post_type' => 'news',
                'post_status' => 'publish'
            ,'orderby' => $sort
            , 'meta_query'	=> array(
                    // 'relation'		=> 'AND',
                    array(
                        'key'	 	=> 'news_text',
                        'value'	  	=> $searchString,
                        'compare' 	=> 'LIKE',
                    ),
                ));
            $the_query = new WP_Query( $args );
            if($the_query->found_posts>0)
            {
                if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();
                unset($news);
                $news = new stdClass();
                $news->id = get_the_ID();
                $news->title = get_the_title();
                $news->registered = get_field('registered');
                $news->date = get_field('date');
                $news->photo = get_field('photo');
                $news->short_anons = get_field('short_anons');
                $news->news_text = get_field('news_text');
                $news->galery = get_field('galery');
                $news->news_add = get_field('news_add');
                $res[] = $news;
                endwhile; else : endif; wp_reset_query();
            }


        }
      return $res;
    }


}