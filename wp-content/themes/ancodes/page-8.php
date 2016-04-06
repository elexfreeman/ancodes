<?php
//Методы терапии
?>
<?php get_header(); ?>

    <div class="navcontainer">
        <div class="nav"><a href="/">Главная</a> / Отзывы</div>
    </div>
    <div class="w-clearfix contentcontainer">


<?php
$args = array('posts_per_page' => 500, 'post_type' => 'reviews', 'post_status' => 'publish');
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


        <div class="w-clearfix usluga">
            <div class="price"><?php the_field( "r_date" ); ?></div>
            <div class="uslugashortdesc"><?php the_field( "r_fio" ); ?></div>
            <div class="uslugatitle"><?php the_field( "r_text" ); ?></div>
            <div class="uslugashortdesc answer"><?php the_field( "r_answer" ); ?></div>
        </div>



<?php endwhile; else : endif; wp_reset_query(); ?>


        <div class="w-form w-clearfix formcontainer">
            <form class="feedback" id="email-form" name="email-form" data-name="Email Form">
                <div class="feedbacktitle">Оставить отзыв</div>
                <label class="feedbacklabel" for="r_name">Ваше имя:</label>
                <input class="w-input" id="r_name" type="text" placeholder="Как вас зовут?" name="r_name" data-name="r_name">
                <label class="feedbacklabel" for="r_email">Ваша электронная почта:</label>
                <input class="w-input" id="r_email" type="email" placeholder="Она нужна для того, чтобы мы смогли вам ответить по e-mail" name="r_email" data-name="r_email" required="required">
                <textarea class="w-input" id="r_text" placeholder="Ваш отзыв" name="r_text" data-name="r_text"></textarea>
                <input onclick="SendReview();" class="w-button feedbacksubmit" type="button" value="Отправить отзыв" data-wait="Please wait...">
           </form> 

        </div>
    </div>

<div class="w-clearfix contentcontainer">

</div>

<?php get_footer(); ?>