<?php

/**
 * Created by PhpStorm.
 * User: folle
 * Date: 29.01.2016
 * Time: 19:40
 */
class RentaSearch
{
    public $Renta = Array();
    public $Cities = Array();
    public $SearchResult = Array();

    public $RentaCount;

    function __construct()
    {
        /*Считваем все апартаменты*/
       $args = array('posts_per_page' => 3000, 'post_type' => 'rent_house', 'post_status' => 'publish');
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):
            while ($the_query->have_posts()) :
                $the_query->the_post();
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
                $r_page->r_place=get_field('r_place');
                if($r_page->r_customplace!='') $r_page->r_city=$r_page->r_customplace;

                $r_page->r_beach_length=get_field('beach_length');
                $this->Renta[]=$r_page;
            endwhile;
        else : endif;
        wp_reset_query();

        /*Считваем все города*/
        $args = array('posts_per_page' => 3000, 'post_type' => 'cities', 'post_status' => 'publish');
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):
            while ($the_query->have_posts()) :
                $the_query->the_post();
                $r_page = new stdClass();
                $r_page->c_photo=get_field('c_photo');
                $r_page->id=get_the_ID();
                $r_page->the_title=get_the_title();
                $r_page->s_about=get_field('s_about');
                $r_page->s_gallery=get_field('s_gallery');
                $r_page->s_curorts=get_field('s_curorts');
                $r_page->url = get_the_permalink();
                $r_page->count = 0;
                $this->Cities[]=$r_page;
            endwhile;
        else : endif;
        wp_reset_query();
        $this->SetCount();
    }

    /*расстояние до пляжа*/
    function BeachLength($l)
    {
        $count=0;
        foreach($this->Renta as $renta)
        {
           if($renta->r_beach_length==$l) $count++;
        }
        return $count;
    }

    /*Выдает кол-ва по типу жилья*/
    function SetCount()
    {
        $this->RentaCount = new stdClass();
        /*Кол-во всего*/
        $this->RentaCount->Total = count($this->Renta);
        /*Тип жилья дома*/
        $this->RentaCount->RentaTypeHouse=0;
        $this->RentaCount->RentaTypeVilla=0;
        $this->RentaCount->RentaTypeAppart=0;
        $this->RentaCount->RentaTypeKvartira=0;
        $this->RentaCount->RentaTypePentHouse=0;
        $this->RentaCount->RentaTypeTownHouse=0;
        $this->RentaCount->RentaTypeComplex=0;


        /*Кол-во комнат*/
        $this->RentaCount->RomsCount1=0;
        $this->RentaCount->RomsCount2=0;
        $this->RentaCount->RomsCount3=0;
        $this->RentaCount->RomsCount4=0;
        $this->RentaCount->RomsCountMore=0;

        /*Удобства*/
        $this->RentaCount->HomeAnimals=0;
        $this->RentaCount->TV=0;
        $this->RentaCount->Wash=0;
        $this->RentaCount->Dishwasher=0;
        $this->RentaCount->Microwave=0;
        $this->RentaCount->Conder=0;
        $this->RentaCount->Internet=0;
        $this->RentaCount->Balkon=0;
        $this->RentaCount->Barbeku=0;
        $this->RentaCount->Bassein=0;

        $this->RentaCount->Kamin=0;
        $this->RentaCount->Sauna=0;
        $this->RentaCount->Jakizi=0;
        $this->RentaCount->Parking=0;

        $this->RentaCount->VidMore=0;

        /*Расстояние до пляжа*/



        foreach($this->Renta as $renta)
        {
            /*Вилла : Вилла
            Апартаменты : Апартаменты
            Дом : Дом
            Квартира : Квартира
            Пентхаус : Пентхаус
            Таунхаус : Таунхаус
            Комплекс : Комплекс*/
            if($renta->rent_type=='Дом') $this->RentaCount->RentaTypeHouse++;
            if($renta->rent_type=='Вилла') $this->RentaCount->RentaTypeVilla++;
            if($renta->rent_type=='Апартаменты') $this->RentaCount->RentaTypeAppart++;
            if($renta->rent_type=='Квартира') $this->RentaCount->RentaTypeKvartira++;
            if($renta->rent_type=='Пентхаус') $this->RentaCount->RentaTypePentHouse++;
            if($renta->rent_type=='Таунхаус') $this->RentaCount->RentaTypeTownHouse++;
            if($renta->rent_type=='Комплекс') $this->RentaCount->RentaTypeComplex++;
            $renta->rooms=$renta->rooms+0;
            if($renta->rooms==1) $this->RentaCount->RomsCount1++;
            if($renta->rooms==2) $this->RentaCount->RomsCount2++;
            if($renta->rooms==3) $this->RentaCount->RomsCount3++;
            if($renta->rooms==4) $this->RentaCount->RomsCount4++;
            if($renta->rooms>4) $this->RentaCount->RomsCountMore++;

            $r_params = $renta->r_params;
            if(in_array('Домашние животные',$r_params))  $this->RentaCount->HomeAnimals++;
            if(in_array('Телевизор',$r_params)) $this->RentaCount->TV++;
            if(in_array('Стиральная машина',$r_params)) $this->RentaCount->Wash++;
            if(in_array('Посудомоечная машина',$r_params)) $this->RentaCount->Dishwasher++;
            if(in_array('Микроволновая печь',$r_params)) $this->RentaCount->Microwave++;
            if(in_array('Кондиционер',$r_params)) $this->RentaCount->Conder++;
            if(in_array('Интернет',$r_params)) $this->RentaCount->Internet++;
            if(in_array('Балкон/Терраса',$r_params)) $this->RentaCount->Balkon++;

            if(in_array('Бассейн',$r_params)) $this->RentaCount->Bassein++;

            if(in_array('Камин',$r_params)) $this->RentaCount->Kamin++;
            if(in_array('Сауна',$r_params))  $this->RentaCount->Sauna++;
            if(in_array('Джакузи',$r_params)) $this->RentaCount->Jakizi++;

            if(in_array('Барбекю',$r_params)) $this->RentaCount->Barbeku++;
            if(in_array('Гараж/паркинг',$r_params)) $this->RentaCount->Parking++;
            if(in_array('Вид на море',$r_params))  $this->RentaCount->VidMore++;


            /*перебераем города*/
            foreach($this->Cities as $key => $City)
            {
                if(($renta->r_city==$City->url)and($renta->r_price!='new'))  $this->Cities[$key]->count++;
            }

            if($renta->r_customplace!='')
            {
                if(isset($this->RentaCount->Customplace[$renta->r_customplace]))
                {
                    $this->RentaCount->Customplace[$renta->r_customplace]++;
                }
                else
                {
                    $this->RentaCount->Customplace[$renta->r_customplace]=1;
                }
            }



        }
    }


    function GetCustomplaceCount($place)
    {
        $res=0;
        if(isset($this->RentaCount->Customplace[$place]))
        {
            $res=  $this->RentaCount->Customplace[$place];
        }
        return $res;
    }

    function GetCityCount($city_name)
    {

        foreach($this->Cities as $City)
        {
            if($City->the_title==$city_name)  return $City->count;
        }
    }

    function tplSearchForm()
    {
        include 'tpl/tplSearchForm.php';
    }

    function tplSearchResult()
    {
        include 'tpl/tplSearchResult.php';
    }

    function tplRentPop($rent)
    {
        $data['rent']=$rent;
        include "tpl/tplRentPop.php";
    }

    /*Выборка по параметрам*/
    function Search()
    {
        $this->SearchResult = $this->Renta;
        /*Ищем тип жилья*/
        if (isset($_GET['RentaType'])) {
            if ($_GET['RentaType'] == 'all') {

            } else {
                foreach ($this->Renta as $i => $r) {
                    if ($r->rent_type != $_GET['RentaType']) {
                        /*Сделать вычитанием*/
                        unset($this->SearchResult[$i]);
                    }
                }

            }
        }
        /*Ищем колво комнат*/
        if (isset($_GET['rooms'])) {
            if ($_GET['rooms'] == 'all') {

            }

            else {
                foreach ($this->Renta as $i => $r) {
                    if ($r->rooms != $_GET['rooms']) {
                        /*Сделать вычитанием*/
                        if($_GET['rooms'] == 'more')
                        {
                            foreach ($this->Renta as $i => $r) {
                                if ($r->rooms < 5) {
                                    /*Сделать вычитанием*/
                                    unset($this->SearchResult[$i]);
                                }
                            }
                        }
                        else
                        unset($this->SearchResult[$i]);
                    }
                }

            }
        }

        /*По расстоянию до пляжа*/
        if( (isset($_GET['length']))and($_GET['length']!='Не важно') )
        {
            foreach ($this->Renta as $i => $r) {
                if($r->r_beach_length!=$_GET['length'])   unset($this->SearchResult[$i]);
            }
        }

        /*Удобства*/
        /*Собираем массив с удобствами*/
        $fields = Array();
        foreach ($_GET as $key => $value )
        {
          if($key{0}=='D')  $fields[]=$value;
        }

        if(count($fields)>0)
        {
           foreach($fields as $field)
           {
               foreach ($this->Renta as $i => $r)
               {
                   if(!in_array($field,$r->r_params)){unset($this->SearchResult[$i]); }
               }
           }


        }


        /*Города*/
        /*Массив с городами*/
        $fields = Array();
        foreach ($_GET as $key => $value )
        {
            if($key{0}=='C')  $fields[]=$value;
        }

        if(count($fields)>0)
        {
            foreach ($this->Renta as $i => $r)
            {
                /*перебираем все города*/

                if((!in_array($r->r_city,$fields))and(!in_array($r->r_customplace,$fields)))
                {
                    //echo $r->r_city;
                    unset($this->SearchResult[$i]);
                }
            }
        }
    }
}