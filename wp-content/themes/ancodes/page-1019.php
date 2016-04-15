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
                        <?php the_content(); ?>


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