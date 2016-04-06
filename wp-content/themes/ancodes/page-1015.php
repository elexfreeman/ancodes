<?php get_header(); ?>

    <div class="page about-page">
        <?php GetSinglePageHeader();?>
        <section class="main">
            <div class="wrapper">
                <div class="main-holder">
                    <div class="content about-company">
                        <div class="title">
                            <h2><?php the_title();?></h2>
                        </div>
                        <?php echo get_field('w_content');?>

                    </div>
                    <aside class="sidebar">
                        <?php tplOurContacts(); ?>
                        <?php tplWeather(); ?>
                    </aside>
                </div>
            </div>
        </section>
        <?php tplFooter(); ?>
    </div>


<?php get_footer(); ?>