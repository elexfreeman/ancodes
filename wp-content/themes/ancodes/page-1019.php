<?php get_header(); ?>

    <div class="page about-page">
        <?php GetSinglePageHeader();?>
        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="content">
                        <div class="title">
                            <h2>Свяжитесь с нами</h2>
                        </div>
                        <form action="#" class="feedback-form">
                            <fieldset>
                                <input type="text" class="text" placeholder="Ваше имя">
                                <input type="text" class="text" placeholder="Ваша электронная почта">
                                <select class="feedback-theme" data-jcf='{"wrapNative": false}'>
                                    <option class="hideme">Тема сообщения</option>
                                    <option>Тема 1</option>
                                    <option>Тема 2</option>
                                </select>
                                <textarea class="text textarea" placeholder="Текст сообщения"></textarea>
                                <div class="submit-row">
                                    <input type="submit" class="submit" value="Отправить сообщение">
                                    <p>Наши операторы отвечают на каждое сообщение в течении 5 часов с момента получения.</p>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <aside class="sidebar">
                        <?php tplOurContacts();?>

                    </aside>
                </div>
            </div>
        </section>
        <?php tplFooter(); ?>
    </div>




<?php get_footer(); ?>