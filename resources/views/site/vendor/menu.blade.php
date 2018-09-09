<nav class="navbar navbar-default">
    <div class="container">
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

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::MAIN_PAGE, []) }}">Главная</a>
                </li>

                <li>
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::ABOUT, []) }}">О нас</a>
                </li>

                {{--<li class="{{ (Route::is('front.service.*') ? 'active' : '') }}">--}}
                    {{--<a href="{{ route('front.service.index') }}">Услуги</a>--}}
                {{--</li>--}}

                <li class="{{ (Route::is('front.gallery.*') ? 'active' : '') }}">
                    <a href="{{ route('front.gallery.index') }}">Галерея</a>
                </li>

                {{--<li class="{{ (Route::is('front.team.*') ? 'active' : '') }}">--}}
                    {{--<a href="{{ route('front.team.index') }}">Команда</a>--}}
                {{--</li>--}}

                {{--<li class="{{ (Route::is('front.appointment.*') ? 'active' : '') }}">--}}
                    {{--<a href="{{ route('front.appointment.index') }}">Запись на прием</a>--}}
                {{--</li>--}}

                <li>
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::BLOG_PAGE, []) }}">Новости</a>
                </li>

                <li>
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::FAQ_PAGE, []) }}">FAQ</a>
                </li>

                <li>
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::CONTACTS_PAGE, []) }}">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
