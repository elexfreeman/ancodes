<?php get_header(); ?>



    <div class="page">
        <?php GetSinglePageHeader();?>
        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="content">
                       <?php the_content(); ?>
                    </div>
                    <aside class="sidebar">

                        <?php tplWeather(); ?>
                        <?php tplReviewsRight(); ?>

                    </aside>
                </div>
            </div>
        </section>
        <?php tplFooter(); ?>
    </div>


<?php get_footer(); ?>