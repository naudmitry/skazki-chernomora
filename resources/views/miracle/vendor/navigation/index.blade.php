<div class="container">
    <div class="header-inner">
        <div class="branding">
            <h1 class="logo">
                <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::MAIN_PAGE, []) }}"><img src="{{ asset('miracle/images/logo@2x.png') }}" alt="" width="25" height="26">Miracle</a>
            </h1>
        </div>
        <nav id="nav">
            <ul class="header-top-nav">
                <li class="mini-search">
                    <a href="#"><i class="fa fa-search has-circle"></i></a>
                    <div class="main-nav-search-form">
                        <form method="get" role="search">
                            <div class="search-box">
                                <input type="text" id="s" name="s" value="">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="visible-mobile">
                    <a href="#mobile-nav-wrapper" data-toggle="collapse"><i class="fa fa-bars has-circle"></i></a>
                </li>
            </ul>
            <ul id="main-nav" class="hidden-mobile">
                <li class="menu-item-has-children">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::MAIN_PAGE, [], $currentShowcase->id) }}">Home</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::FAQ_PAGE, [], $currentShowcase->id) }}">FAQ</a>
                </li>
                <li class="menu-item-has-children mega-menu-item mega-column-4">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::ABOUT_PAGE, [], $currentShowcase->id) }}">About us</a>
                </li>
                <li class="menu-item-has-children mega-menu-item mega-column-6">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::BLOG_PAGE, [], $currentShowcase->id) }}">Blog</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::CONTACTS_PAGE, [], $currentShowcase->id) }}">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</div>