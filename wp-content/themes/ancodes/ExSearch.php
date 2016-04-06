<?php

/**
 * Created by PhpStorm.
 * User: folle
 * Date: 03.04.2016
 * Time: 9:47
 */
class ExSearch
{
    function __construct()
    {

    }

    function search()
    {
        /*action:"ExSearch"
            ex_city_2:"Андорра"
            ex_city_6:"Коста Дорада"
            ex_type:"групповая"
        */
        /*Собираем массив запроса*/
        $realtions = array('relation'		=> 'AND');

        /*Города*/
        $city = array();
        foreach ($_GET as $key=>$value) {

            $pos      = strripos($key, 'ex_city');

            if ($pos === false) {

            } else {
                $city[]=$value;
            }

        }


        $ex_city=null;
        if(count($city)>0)
        $ex_city=array('key'	 	=> 'ex_city',
            'value'	  	=> $city,
            'compare' 	=> 'IN',);

        $ex_type=null;

       // $realtions=null;

        if((isset($_GET['ex_type']))and($_GET['ex_type']!=1)) $ex_type= array(
            'key'	  	=> 'ex_type',
            'value'	  	=> $_GET['ex_type'],
            'compare' 	=> '=',
        );


        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'excurs',
            'post_status' => 'publish',
            'meta_query'	=> array(
                $realtions,
                $ex_city,
                $ex_type,
            ),
        );


        $the_query = new WP_Query($args);
        require_once "tpl/tplExSearchResult.php";
        wp_reset_query();
    }

    function total()
    {
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'excurs',
            'post_status' => 'publish',

        );
        $the_query = new WP_Query($args);
        return $the_query->found_posts;
    }

    function GetFieldCount($field,$value)
    {
        $args = array('posts_per_page' => 9999, 'post_type' => 'excurs', 'post_status' => 'publish');

        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'excurs',
            'post_status' => 'publish',
            'meta_query'	=> array(
               // 'relation'		=> 'AND',
                array(
                    'key'	 	=> $field,
                    'value'	  	=> array($value),
                    'compare' 	=> 'IN',
                ),
            /*    array(
                    'key'	  	=> 'featured',
                    'value'	  	=> '1',
                    'compare' 	=> '=',
                ),*/
            ),
        );
        $the_query = new WP_Query($args);
        return $the_query->found_posts;
        /*$p_id = 1;
        if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post();

        endwhile;
        else : endif;*/
        wp_reset_query();
    }
}