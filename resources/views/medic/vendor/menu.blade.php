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
                <span class="sr-only">Навигация</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ (Route::getFacadeRoot()->current()->uri() == static_page_route(\App\Classes\StaticPageTypesEnum::MAIN_PAGE, [], $currentShowcase->id) ? 'active' : '') }}">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::MAIN_PAGE, [], $currentShowcase->id) }}">Главная</a>
                </li>

                <li class="{{ (Request::url() == static_page_route(\App\Classes\StaticPageTypesEnum::ABOUT_PAGE, [], $currentShowcase->id) ? 'active' : '') }}">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::ABOUT_PAGE, [], $currentShowcase->id) }}">О нас</a>
                </li>

                {{--<li class="{{ (Route::is('front.service.*') ? 'active' : '') }}">--}}
                    {{--<a href="{{ route('front.service.index') }}">Услуги</a>--}}
                {{--</li>--}}

                <li class="{{ (Route::is('site.gallery.*') ? 'active' : '') }}">
                    <a href="{{ route('site.gallery.index') }}">Галерея</a>
                </li>

                {{--<li class="{{ (Route::is('front.team.*') ? 'active' : '') }}">--}}
                    {{--<a href="{{ route('front.team.index') }}">Команда</a>--}}
                {{--</li>--}}

                {{--<li class="{{ (Route::is('front.appointment.*') ? 'active' : '') }}">--}}
                    {{--<a href="{{ route('front.appointment.index') }}">Запись на прием</a>--}}
                {{--</li>--}}

                <li class="{{ (Request::url() == static_page_route(\App\Classes\StaticPageTypesEnum::BLOG_PAGE, [], $currentShowcase->id) ? 'active' : '') }}">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::BLOG_PAGE, [], $currentShowcase->id) }}">Новости</a>
                </li>

                <li class="{{ (Request::url() == static_page_route(\App\Classes\StaticPageTypesEnum::FAQ_PAGE, [], $currentShowcase->id) ? 'active' : '') }}">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::FAQ_PAGE, [], $currentShowcase->id) }}">Вопросы и ответы</a>
                </li>

                <li class="{{ (Request::url() == static_page_route(\App\Classes\StaticPageTypesEnum::CONTACTS_PAGE, [], $currentShowcase->id) ? 'active' : '') }}">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::CONTACTS_PAGE, [], $currentShowcase->id) }}">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
