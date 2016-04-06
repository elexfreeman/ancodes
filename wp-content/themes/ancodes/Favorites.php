<?php

/**
 * Created by PhpStorm.
 * User: folle
 * Date: 11.01.2016
 * Time: 16:11
 */

//Класс для работы с избранным
class Favorites
{
    /*Проверяет есть ли в избранном*/
    function IsIn($id)
    {
        $res=false;
        if(isset($_SESSION['favorites']))
        {
            foreach($_SESSION['favorites'] as $f)
            {
                if($f->id==$id) $res=true;
            }
        }
        return $res;
    }

    //Добавляет
    function Add($id)
    {global $post;
        $res['f']=0;
        if(!$this->IsIn($id))
        {
            /*Ищем объект*/
            $args = array('posts_per_page' => 300, 'post_type' => 'rent_house', 'post_status' => 'publish');
            $the_query = new WP_Query( $args );
            $p_count=0;
//собираем массив с данными

            if(!isset($_SESSION['favorites']))  $_SESSION['favorites']=Array();
            if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();

                if(get_the_ID()==$id)
                {
                    $r_page = new stdClass();
                    $r_page->r_img=get_field('r_img');
                    $r_page->id=get_the_ID();
                    $r_page->r_params=get_field('r_params');
                    $r_page->rent_type=get_field('rent_type');
                    $r_page->rent_company=get_field('rent_company');
                    $r_page->the_title=get_the_title();
                    $r_page->r_price=get_field('r_price');
                    $r_page->square=get_field('square');
                    $r_page->rooms=get_field('rooms')+0;
                    $r_page->r_photos=get_field('r_photos');
                    $r_page->r_descripton=get_field('r_descripton');
                    $r_page->r_hot=get_field('r_hot');
                    $r_page->r_city=get_field('r_city');
                    $r_page->r_customplace=get_field('r_customplace');
                    if($r_page->r_customplace!='') $r_page->r_city=$r_page->r_customplace;

                    $r_page->r_beach_length=(int)get_field('beach_length');
                    $p_count++;
                    $_SESSION['favorites'][]=$r_page;

                    $res['f']=$r_page->id;
                    $res['count']=$this->GetCount();
                }

            endwhile; else : endif; wp_reset_query();
            $res['status']='add';

        }
        else
        {
            $this->Delete($id);
            $res['status']='delete';
        }
        echo json_encode($res);
    }

    //выдает массив объектов
    function GetList()
    {
        return $_SESSION['favorites'];
    }

    //Удаляет
    function Delete($id)
    {
        if(isset($_SESSION['favorites']))
        {
            foreach($_SESSION['favorites'] as $key=>$f)
            {
                if($f->id==$id) $_SESSION['favorites'][$key]=null;
            }
        }

    }

    function Clear()
    {
        $_SESSION['favorites']=null;
    }

    function GetCount()
    {
        $count=0;

        if(isset($_SESSION['favorites']))
        {
            foreach($_SESSION['favorites'] as $favorite )
            {
                if($favorite!=null) $count++;
            }
            $f=$_SESSION['favorites'];
            return $count;
        }
        else
        {
            return 0;
        }
    }
    function UpdateMenu()
    {
        include 'tpl/tplFavoritesLink.php';
    }

    function tplFavoritesList()
    {
        require_once 'tpl/tplFavoritesList.php';
    }

}