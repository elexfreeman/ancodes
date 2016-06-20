<?php get_header(); ?>
<?php
$news = array();
if(isset($_GET['searchString']))
{
    $sr = new SiteSearch();
    if(isset($_GET['sort']))
    {
        if($_GET['sort']==2) $sort = 'title';else $sort = 'date';
    }
    $news = $sr->News($_GET['searchString'],$sort);
}
?>
<div class="page about-page">
    <?php GetSinglePageHeader(); ?>
    <section class="main">
        <div class="wrapper">
            <div class="main-holder">
                <div class="content">
                    <div class="title">
                        <h2><span><?php echo count($news); ?> результатов по запросу</span> “<?php echo $_GET['searchString'];?>”</h2>
                    </div>
                    <div class="filter">
                        <ul class="filter-list">
                            <li class="active"><a href="#"><span>новости</span> <em><?php echo count($news); ?></em></a></li>
                            <li><a href="#"><span>аренда</span> <em>18</em></a></li>
                        </ul>
                        <form class="filter-form" id="sort-form">
                            <input type="hidden" name="searchString" value="<?php echo $_GET['searchString']; ?>">
                            <fieldset>
                                <select
                                    onchange="$('#sort-form').submit()"
                                    class="filter-select" data-jcf='{"wrapNative": false}' name="sort">
                                    <option value="1" <?php if((isset($_GET['sort']))and($_GET['sort']==1)) echo 'selected'; ?>>названию</option>
                                    <option value="2" <?php if((isset($_GET['sort']))and($_GET['sort']==2)) echo 'selected'; ?>>дате</option>
                                </select>
                                <span class="label">cортировать по</span>
                            </fieldset>
                        </form>
                    </div>

                    <ul class="results-list">
                        <?php
                        foreach($news as $nn)
                        {
                            ?>
                            <li>
                                <a href="/news/#news-popup<?php echo $nn->id; ?>">
                                    <h3><?php echo $nn->title; ?></h3>
                                </a>
                                <span class="date"><?php echo NewsConvertDate($nn->date); ?></span>
                                <p>
                                    <?php echo $nn->short_anons; ?>
                                    <!--.. не боимся кризиса и смотрим с оптимизмом в будущее.
                                    <strong class="text-orange"><em>Отличное место для отдыха</em></strong>
                                    Вечеринка GOOD NIGHT PARTY, которая состоится 05/12/14 в SKY BAR на 18 этаже...
                                    -->
                                </p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>

<!--
                    <ul class="results-list">
                        <li>
                            <h3>Фотоотчет с бизнес-завтрака в ресторане «The Kitchen»</h3>
                            <span class="date">21 декабря 2014 г.</span>
                            <p>... не боимся кризиса и смотрим с оптимизмом в будущее. <strong class="text-orange"><em>Отличное место для отдыха</em></strong> Вечеринка GOOD NIGHT PARTY, которая состоится 05/12/14 в SKY BAR на 18 этаже...</p>
                        </li>
                        <li>
                            <h3>Названы самые популярные рождественские направления в Испании</h3>
                            <span class="date">21 декабря 2014 г.</span>
                            <p>Андалусия и Каталoния оказались наиболее <strong class="text-orange"><em>отличным</em></strong>и <strong class="text-orange"><em>места</em></strong>ми испанскими направлениями на Рождество. Такие данные приводит Seleсtahotels, отмечая, что количество бронирован...</p>
                        </li>
                        <li>
                            <h3>Летний сезон на Майорке продлен на два месяца</h3>
                            <span class="date">21 декабря 2014 г.</span>
                            <p>... более 17 % бронирований отелей приходится на Каталонию, почти 14,5 % туристов выбирают <strong class="text-orange"><em>отличн</em></strong>ую Андалусию.</p>
                        </li>
                        <li>
                            <h3>Фотоотчет с бизнес-завтрака в ресторане «The Kitchen»</h3>
                            <span class="date">21 декабря 2014 г.</span>
                            <p>... не боимся кризиса и смотрим с оптимизмом в будущее. <strong class="text-orange"><em>Отличное место для отдыха</em></strong> Вечеринка GOOD NIGHT PARTY, которая состоится 05/12/14 в SKY BAR на 18 этаже...</p>
                        </li>
                        <li>
                            <h3>Летний сезон на Майорке продлен на два месяца</h3>
                            <span class="date">21 декабря 2014 г.</span>
                            <p>... более 17 % бронирований отелей приходится на Каталонию, почти 14,5 % туристов выбирают <strong class="text-orange"><em>отличн</em></strong>ую Андалусию.</p>
                        </li>
                    </ul>
                    <div class="paging">
                        <ul class="paging-list">
                            <li class="disabled"><a href="#">&laquo;</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                        <form action="#" class="caption">Показано <input type="text" class="text" value="5"> из 13</form>
                    </div>
                    -->
                </div>


                <aside class="sidebar">
                    <?php tplOurContacts(); ?>

                </aside>
            </div>
        </div>
    </section>
    <?php tplFooter(); ?>
</div>
<?php get_footer(); ?>

