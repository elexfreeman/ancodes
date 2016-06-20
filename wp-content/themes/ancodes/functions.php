<?php
if (!session_id()) {
    session_start();
}

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action('wp_head', 'wp_generator');



add_action( 'admin_menu', 'default_published_oprf' );
function default_published_oprf() 
{
    global $submenu;
    foreach( $submenu['edit.php'] as $key => $value )
    {
        if( in_array( 'edit.php', $value ) )
        {
            $submenu['edit.php'][ $key ][2] = 'edit.php?post_status=publish&post_type=post';
        }
    }
}

if (!current_user_can('edit_others_posts')) { add_filter('show_admin_bar', '__return_false'); }




function post_remove ()      //creating functions post_remove for removing menu item
{ 
   remove_menu_page('edit.php');
   remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'post_remove');




function remove_page_attribute_meta_box()
{
    if( is_admin() ) {
        if( current_user_can('editor') ) {
            remove_meta_box('pageparentdiv', 'page', 'normal');
        }
    }
}
add_action( 'admin_menu', 'remove_page_attribute_meta_box' );



$trans = array("Январь" => "января",
               "Февраль" => "февраля",
               "Март" => "марта",
               "Апрель" => "апреля",
               "Май" => "мая",
               "Июнь" => "июня",
               "Июль" => "июля",
               "Август" => "августа",
               "Сентябрь" => "сентября",
               "Октябрь" => "октября",
               "Ноябрь" => "ноября",
               "Декабрь" => "декабря");


/* Remove Contact Form 7 Links from dashboard menu items if not admin */
    if (!(current_user_can('administrator'))) {
	function remove_wpcf7() {
	    remove_menu_page( 'wpcf7' ); 
	}

	add_action('admin_menu', 'remove_wpcf7');
     }



function remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts


  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance


 // remove_menu_page( 'tools.php' );                  //Tools

  
}
add_action( 'admin_menu', 'remove_menus' );


function NewsConvertDate($date)
{
    list($y, $m, $d)  = explode('-', $date);
    $month_str = array(
        'января', 'февраля', 'марта',
        'апреля', 'мая', 'июня',
        'июля', 'августа', 'сентября',
        'октября', 'ноября', 'декабря'
    );
    $month_int = array(
        '01', '02', '03',
        '04', '05', '06',
        '07', '08', '09',
        '10', '11', '12'
    );

    // Замена числового обозначения месяца на словесное (склоненное в падеже)
    $m = str_replace($month_int, $month_str, $m);
    // Формирование окончательного результата
    if ($d[0] == 0) $d = $d[1];
    return $d.' '.$m.' '.$y.' г.';

}


function WeatherConvertDate($date)
{
    list($y, $m, $d)  = explode('-', $date);
    $month_str = array(
        'января', 'февраля', 'марта',
        'апреля', 'мая', 'июня',
        'июля', 'августа', 'сентября',
        'октября', 'ноября', 'декабря'
    );
    $month_int = array(
        '01', '02', '03',
        '04', '05', '06',
        '07', '08', '09',
        '10', '11', '12'
    );

    // Замена числового обозначения месяца на словесное (склоненное в падеже)
    $m = str_replace($month_int, $month_str, $m);
    // Формирование окончательного результата
    if ($d[0] == 0) $d = $d[1];
    return $d.' '.$m;

}

require_once "YahooWeather.php";

//*******-*-*-*-*-*-*-*-*-*-*-*-*-*
//          Шаблоны
function GetSinglePageHeader()
{
    require_once "tpl/tplSinglePageHeader.php";
}

function tplReviewsRight()
{
    require_once "tpl/tplReviewsRight.php";
}

function tplWeather()
{
    require_once "tpl/tplWeather.php";
}

function tplNewsRight()
{
    require_once "tpl/tplNewsRight.php";
}

function tplExcSearch()
{
    require_once "tpl/tplExcSearch.php";
}

function tplOurContacts()
{
    require_once "tpl/tplOurContacts.php";
}

function tplRssForm_and_soc_buttons()
{
    require_once "tpl/tplRssForm_and_soc_buttons.php";
}


function tplFooter()
{
    require_once "tpl/tplFooter.php";
}

function tplSignIn()
{
    require_once "tpl/tplSignIn.php";
}

function tplNavLine()
{
    require_once "tpl/tplNavLine.php";
}

function tplFavoritesLink()
{
    require_once "tpl/tplFavoritesLink.php";
}

function tplExcTours()
{
    require_once "tpl/tplExcTours.php";
}


function tplMICE()
{
    require_once "tpl/tplMICE.php";
}

function tplInfoTurist()
{
    require_once "tpl/tplInfoTuris.php";
}

function tplExForm()
{
    require_once "tpl/tplExForm.php";
}



function tplAgency()
{
    require_once "tpl/tplAgency.php";
}

//******************************

//возвращает инфу по курорту по его ID
function GetCurortInfo($id)
{
    $args = array( 'post_type' => 'curorts', 'post_status' => 'publish', 'meta_query' => array(
        array(
            'field' => 'id',
            'value' => $id,
            'compare' => '='
        )));

    $args = array('post_type' => 'curorts', 'post_status' => 'publish');
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();
        if (get_the_ID()==$id)
        {
            $curort = new stdClass();
            $curort->ID=$id;
            $curort->title=get_the_title();
            $curort->c_description=get_field('c_description');
            $curort->c_gallery=get_field('c_gallery');
        }

    endwhile; else : endif; wp_reset_query();
    return $curort;
}

function GetCurortsCount($curorts)
{
    $c=count($curorts);
    if($c==0) return 'Курорты отсутствуют';
    elseif($c==1) return '1 курорт';
    elseif(($c==2)or($c==3)or($c==4)) return $c.' курорта';
    elseif($c>4) return $c.' курортов';
}

require_once 'Favorites.php';
require_once 'RentaSearch.php';
require_once 'ExSearch.php';
require_once 'SearchInDirectory.php';
require_once 'SiteSearch.php';

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

    if (empty($pagerange)) {
        $pagerange = 2;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     *
     * It's good because we can now override default pagination
     * in our theme, and use this function in default quries
     * and custom queries.
     */
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if(!$numpages) {
            $numpages = 1;
        }
    }

    /**
     * We construct the pagination arguments to enter into our paginate_links
     * function.
     */
    $pagination_args = array(
        'base'            => get_pagenum_link(1) . '%_%',
        'format'          => 'page/%#%',
        'total'           => $numpages,
        'current'         => $paged,
        'show_all'        => False,
        'end_size'        => 1,
        'mid_size'        => $pagerange,
        'prev_next'       => True,
        'prev_text'       => __('&laquo;'),
        'next_text'       => _,
        'type'            => __('&raquo;'),
        'add_args'        => false,
        'add_fragment'    => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        ?>
        <div class="paging">
            <ul class="paging-list">

                <?php echo $paginate_links;?>
            </ul>
              <span class="caption">Показано <?php echo $paged; ?> из <?php echo $numpages;?></span>
        </div>
<?php

    }

}