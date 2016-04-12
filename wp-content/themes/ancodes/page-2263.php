

    <?php get_header(); ?>
    <div class="page about-page">
        <?php GetSinglePageHeader();?>
        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="content">
                        <div class="title">
                            <h2>Тарифы</h2>
                        </div>

                        <?php
                        if (is_user_logged_in()) {
                            the_content();
                        }
                        else {
                            echo "Страница недоступна.";
                        }
                        ?>

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

