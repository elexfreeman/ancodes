<?php get_header(); ?>





<div class="navcontainer">
    <div class="nav"><a href="/">Главная</a> / О клинике</div>
</div>

<?php $aboutpic = get_field('aboutpic');?>
<?php $content = get_field('content');?>
<?php $lic = get_field('lic');?>




<div class="w-clearfix contentcontainer"><img class="specpagemainimg" src="<?php echo $aboutpic['sizes']['large']; ?>">
    <div class="specpagedesc"><?php print_r($content); ?></div>
    <div class="w-clearfix gallerycontainer">
        <?php foreach( $lic as $image ): ?>


            <a class="w-lightbox w-inline-block galleryitem" href="<?php echo $image['url']; ?>">
                <img src="<?php echo $image['sizes']['medium']; ?>" alt="eventz">
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

        <?php endforeach; ?>
    </div>
</div>




<?php get_footer(); ?>