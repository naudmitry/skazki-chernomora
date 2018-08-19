<!--Main Header-->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button
                    type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false"
            >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ (Route::is('front.index') ? 'active' : '') }}">
                    <a href="{{ route('front.index') }}">Главная</a>
                </li>

                <li class="{{ (Route::is('front.about.*') ? 'active' : '') }}">
                    <a href="{{ route('front.about.index') }}">О нас</a>
                </li>

                <li class="{{ (Route::is('front.service.*') ? 'active' : '') }}">
                    <a href="{{ route('front.service.index') }}">Услуги</a>
                </li>

                <li class="{{ (Route::is('front.gallery.*') ? 'active' : '') }}">
                    <a href="{{ route('front.gallery.index') }}">Галерея</a>
                </li>

                <li class="{{ (Route::is('front.team.*') ? 'active' : '') }}">
                    <a href="{{ route('front.team.index') }}">Команда</a>
                </li>

                <li class="{{ (Route::is('front.appointment.*') ? 'active' : '') }}">
                    <a href="{{ route('front.appointment.index') }}">Запись на прием</a>
                </li>

                <li class="{{ (Route::is('front.blog.*') ? 'active' : '') }}">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::BLOG_PAGE, []) }}">Новости</a>
                </li>

                <li class="{{ (Route::is('front.contact.*') ? 'active' : '') }}">
                    <a href="{{ route('front.contact.index') }}">Контакты</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!--End Main Header -->
