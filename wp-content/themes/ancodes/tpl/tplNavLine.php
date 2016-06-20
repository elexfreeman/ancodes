<div class="nav-line">
    <div class="holder">
        <nav class="nav">
            <ul>
                <li class="home"><a href="/">На главную</a></li>
                <li><a href="/about_company/">О компании</a></li>
                <li><a href="/sity-and-k/">Курорты</a></li>
                <li><a href="/excuts/">Экскурсии</a></li>
                <li><a href="/news/">Предложения</a></li>
                <?php
                if ( is_user_logged_in() ) {
                   ?>
                    <li><a href="/tarif/">Тарифы</a></li>
                    <style>
                        .nav li {
                            float: left;
                            padding: 0 13px 0 20px;
                        }
                    </style>
                <?php
                }

                ?>
                <li><a href="/ourcontakts/">Контакты</a></li>
            </ul>
        </nav>
        <span onclick="$('.search-input-block').fadeIn();"  class="search">search</span>
        <div class="search-input-block" >
            <form action="/search-result">
              <span class="search-close" onclick="$('.search-input-block').fadeOut();">X</span>
            <input type="text" name="searchString" />
            <button type="submit">Найти</button>
            </form>
        </div>
    </div>
</div>