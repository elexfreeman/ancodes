<?php get_header(); ?>



<?php $mainimg = get_field('main_img');?>

<div class="navcontainer">
    <div class="nav"><a href="/">Главная</a> / Контакты</div>
</div>

<div class="w-clearfix contentcontainer"><img class="specpagemainimg" src="<?php echo $mainimg['sizes']['large']; ?>">
    <div class="specpagedesc"><?php the_field( "description" ); ?></div>
    <div class="w-form w-clearfix formcontainer " id="cf">
        <form class="feedback" id="email-form" name="email-form" data-name="Email Form">
            <div class="feedbacktitle">Записаться на прием</div>
            <label class="feedbacklabel" for="user_name">Ваше имя:</label>
            <input class="w-input" id="user_name" type="text" placeholder="Как вас зовут?" name="user_name" data-name="user_name">
            <label class="feedbacklabel" for="user_phone">Ваш телефон:</label>
            <input class="w-input" id="user_phone" type="text" placeholder="Мы перезвоним вам, чтобы подтвердить запись" name="user_phone" data-name="user_phone" required="required">
            <textarea class="w-input" id="user_msg" placeholder="Услуга или специалист, которые вас интересуют." name="user_msg" data-name="user_msg"></textarea>
            <!-- <input class="w-button feedbacksubmit" type="submit" value="Отправить вопрос" data-wait="Please wait...">-->
            <span class="click specialistsliderzapis" onclick="SendQuestion();">Отправить вопрос</span>
        </form>
    </div>
</div>

<?php $aboutpic = get_field('aboutpic');?>
<?php $content = get_field('content');?>
<?php $lic = get_field('lic');?>
<div class="w-clearfix contentcontainer"><img class="specpagemainimg" src="<?php echo $aboutpic['url']; ?>">
    <div class="specpagedesc"><?php print_r($content); ?></div>
    <div class="w-clearfix gallerycontainer">
        <a class="w-lightbox w-inline-block galleryitem" href="#"><img src="<?php echo $lic['url']; ?>">
            <script type="application/json" class="w-json">
                { "items": [] }
            </script>
        </a>
    </div>
</div>




<?php get_footer(); ?>