
<?php
if (is_user_logged_in()) {
    ?>
    <a class="enter" href="<?php echo wp_logout_url("/"); ?>"><span>Выход</span></a>
    <?php
} else {
    ?>
    <a href="#sign-in" class="enter popup-btn">
        <span>Вход для агентств</span>
    </a>
    <?php
}
?>

<div class="sign-in-popup" id="sign-in">
    <div class="title-holder">
        <h2><img src="images/ico-title.png" alt="" width="24" height="26"> Вход для агентств</h2>
    </div>
    <form class="sign-form" action="/wp-login.php" method="post">
        <div class="sign-standart">


            <div class="sign-standart">

                <p class="login-username">
                    <label for="user_login">Имя пользователя</label>
                    <input type="text" name="log" id="user_login" class="input" value="" size="20">
                </p>

                <p class="login-password">
                    <label for="user_pass">Пароль</label>
                    <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
                </p>

                <p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme"
                                                        value="forever"> Запомнить меня</label></p>

                <p class="login-submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Войти">
                    <input type="hidden" name="redirect_to" value="http://ancodes.com/tarif/">
                </p>

                <div class="forgot"><a href="#">Забыли пароль? </a></div>
            </div>

        </div>
        <!--
        <div class="sign-social">
            <h3>Вход через соцсети</h3>
            <p>Для входа через социальные сети ваш аккаунт должен быть привязан. Привязка доступна в настройках профиля.</p>
            <span class="social-title">Войти с помощью</span>
            <ul class="social-list social-colored">
                <li class="ok"><a href="#">ok</a></li>
                <li class="fb"><a href="#">fb</a></li>
                <li class="vk"><a href="#">vk</a></li>
                <li class="twitter"><a href="#">twitter</a></li>
            </ul>
        </div>
        -->
    </form>
</div>
                      