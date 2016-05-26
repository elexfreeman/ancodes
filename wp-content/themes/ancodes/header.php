<?php
/*
if (!isset($_COOKIE['auth_key']) OR !trim($_COOKIE['auth_key']))
{
    if (isset($_POST['f_pass']) AND ($_POST['f_pass']=='1qazxsw2'))
    {
        setcookie('auth_key', time(), time() + 60*60*24);
        Header('Location: http://ancodes.com/');
    }
    die('<html><head><title>AUTH</title></head><body><h3>Auth required</h3><form action="" method="post"><input type="password" name="f_pass" value="" /><input type="submit" value="Enter"></form></body></html>');
}
else
{
    if (isset($_GET['bye']) AND ($_GET['bye']=='bye'))
    {
        setcookie('auth_key', NULL, -1);
        Header('Location: http://ancodes.com/');
    }
}*/
?>
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

    <script type="text/javascript" src="/js/jcf.js"></script>
    <script type="text/javascript" src="/js/jcf.select.js"></script>
    <script src="/js/jquery.movingboxes.js"></script>
    <script src="/js/movingboxes.demo.js"></script>
    <script src="/js/jquery.fancybox.pack.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/Favorites.js"></script>
    <script src="/js/RentaSearh.js"></script>
    <script src="/js/Ex.js"></script>
    <link rel="stylesheet" href="/wp-content/plugins/wp-social-likes/css/social-likes_classic.css">
    <script src="/wp-content/plugins/wp-social-likes/js/social-likes.min.js"></script>

    <link rel="stylesheet" href="/css/owl.carousel.css">

    <script src="/js/owl.carousel.min.js"></script>





    <script>



        $(window).on('load', function() {
            jcf.replaceAll();
        });

        <?php if (is_home()) { ?>
        $(document).ready(function() {
            $("a").each(function(i){
                var names = $(this).attr("href");
                if (names != '#'){
                    name = names.replace('#', "")
                    $(this).attr("id", name+'1');
                    //alert(name);
                }
            });


        });
            <?php } ?>



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