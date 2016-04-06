<?php get_header(); ?>


<?php get_header(); if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php $mainpostimg = get_field('main_photo'); ?>
    <div class="navcontainer">
        <div class="nav"><a href="/">Главная</a> / <a href="/specialists/">Специалисты</a> / <?php the_title(); ?></div>
    </div>



    <div class="w-clearfix contentcontainer">
        <img class="specpagemainimg" src="<?php echo $mainpostimg['sizes']['large']; ?>">
        <div class="specpagedesc">
            <h1 class="specpagename"><?php the_title(); ?>,</h1>
            <div class="specpagetitul"><?php the_field( "doljnost" ); ?></div>
            <div class="specpagedesc1"><?php the_field( "full_description" ); ?></div>
            <a class="click specialistsliderzapis" href="/contacts/#cf">Записаться на прием</a>
        </div>

        <?php
        //personal_category
        $personal_category = get_field('personal_category');
        if($personal_category=='Старший персонал')
        {
            ?>

            <div class="interview">
                <?php if (get_field("interview")) { ?><div class="interviewtitle">Интервью:</div>
                    <div class="interviewtxt"><?php the_field( "interview" ); ?></div><?php } ?>
                <div class="w-form w-clearfix" style1="display: none;">

                    <input type="hidden" name="s_email" value="<?php the_field( "email" ); ?>">
                    <input type="hidden" name="s_name" value="<?php the_title(); ?>">
                    <div class="feedbacktitle">Задать вопрос этому специалисту</div>

                    <label class="feedbacklabel" for="user_name">Ваше имя:</label>
                    <input class="w-input" id="user_name" type="text" placeholder="Как вас зовут?" name="user_name" data-name="Name 2">

                    <label class="feedbacklabel" for="user_email">Ваша электронная почта:</label>
                    <input class="w-input" id="user_email" type="email" placeholder="Она нужна для того, чтобы мы смогли вам ответить по e-mail" name="user_email" data-name="Email 2" required="required">

                    <label class="feedbacklabel" for="field">Сообщение:</label>
                    <textarea class="w-input" id="user_msg" name="user_msg" placeholder="Ваш вопрос"></textarea>

                    <!-- <input class="w-button specialistsliderzapis" type="button" value="Отправить вопрос" data-wait="Please wait..."> -->
                    <span class="click specialistsliderzapis" onclick="SendSpecEmail();">Отправить вопрос</span>

                </div>
            </div>
            <?php
        }
        ?>




        <div class="w-clearfix gallerycontainer">
            <?php  $images = get_field('galery'); if( $images ): ?>
        <?php foreach( $images as $image ): ?>


            <a class="w-lightbox w-inline-block galleryitem" href="<?php echo $image['url']; ?>"><img src="<?php echo $image['sizes']['medium']; ?>" alt="eventz">
                <script type="application/json" class="w-json">
                    { "group": "singlevent",
                        "items": [{
                            "url": "<?php echo $image['url']; ?>",
                            "fileName": "<?php echo $image['url']; ?>",
                            "origFileName": "<?php echo $image['title']; ?>",
                            "width": <?php echo $image['sizes']['large-width']; ?>,
                            "height": <?php echo $image['sizes']['large-height']; ?>,
                            "type": "image"
                        }] }
                </script>
            </a>

        <?php endforeach; endif; ?>
        </div>
    </div>




<?php endwhile; else : endif;  ?>

<?php get_footer(); ?>