<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width">
    <title>Ancodes</title>
    <base href="http://ancodes.com/">
    <link type="text/css" rel="stylesheet" href="css/jquery.fancybox.css"/>
    <link type="text/css" rel="stylesheet" href="css/jcf.css"/>
    <link type="text/css" rel="stylesheet" href="wp-content/themes/ancodes/style.css"/>
    <?php if (is_home()) { ?>
    <link rel="stylesheet" href="css/revolution-settings.css">
    <?php } ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/js/jquery.themepunch.tools.min.js"></script>
    <script src="/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="/js/jcf.js"></script>
    <script type="text/javascript" src="/js/jcf.select.js"></script>
    <script src="/js/jquery.movingboxes.js"></script>
    <script src="/js/movingboxes.demo.js"></script>
    <script src="/js/jquery.fancybox.pack.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/Favorites.js"></script>
    <script src="/js/RentaSearh.js"></script>
    <script src="/js/Ex.js"></script>
    <link rel="stylesheet" href="/wp-content/plugins/wp-social-likes\css\social-likes_classic.css">
    <script src="/wp-content/plugins/wp-social-likes/js/social-likes.min.js"></script>
    <script>

$(document).ready(function() {
	$(".singlegal").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});

        $(window).on('load', function() {
            jcf.replaceAll();
        });

        $(document).ready(function() {
            $("a").each(function(i){
                var names = $(this).attr("href");
                if (names != '#'){
                    name = names.replace('#', "")
                    $(this).attr("id", name+'1');
                    //alert(name);
                }
            });


            jQuery('.tp-banner').show().revolution(
                {
                    dottedOverlay:"none",
                    delay:4000,
                    startwidth:1170,
                    startheight:600,
                    hideThumbs:0,

                    thumbWidth:100,
                    thumbHeight:50,
                    thumbAmount:5,

                    navigationType:"none",
                    navigationArrows:"solo",
                    navigationStyle:"round",

                    touchenabled:"on",
                    onHoverStop:"on",

                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,

                    parallax:"mouse",
                    parallaxBgFreeze:"on",
                    parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

                    keyboardNavigation:"off",

                    navigationHAlign:"center",
                    navigationVAlign:"bottom",
                    navigationHOffset:0,
                    navigationVOffset:20,

                    soloArrowLeftHalign:"left",
                    soloArrowLeftValign:"center",
                    soloArrowLeftHOffset:138,
                    soloArrowLeftVOffset:0,

                    soloArrowRightHalign:"right",
                    soloArrowRightValign:"center",
                    soloArrowRightHOffset:138,
                    soloArrowRightVOffset:0,

                    shadow:0,
                    fullWidth:"on",
                    fullScreen:"off",
                    fullScreenOffset: 0,

                    spinner:"spinner4",

                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,

                    shuffle:"off",

                    autoHeight:"off",
                    forceFullWidth:"off",



                    hideThumbsOnMobile:"off",
                    hideNavDelayOnMobile:1500,
                    hideBulletsOnMobile:"off",
                    hideArrowsOnMobile:"off",
                    hideThumbsUnderResolution:0,

                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    startWithSlide:0
                });
        });
        function onloadhello(){
            var hash = window.location.hash.substring(1);
            var hash_len = hash.length;
            if (hash_len > 0){
                $('#'+hash+'1').trigger('click');
            }
        }
    </script>

    <script src="http://use.typekit.net/zfl2xwa.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <link type="text/css" rel="stylesheet" href="css/ie.css"/>
    <![endif]-->
</head>
<body class="home-page" onload="javascript: onloadhello();">