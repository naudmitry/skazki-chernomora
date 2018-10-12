<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item @if (Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">
                <i class="app-menu__icon fas fa-home"></i>
                <span class="app-menu__label">Панель управления</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="#">
                <i class="app-menu__icon fas fa-chart-line"></i>
                <span class="app-menu__label">Статистика</span>
            </a>
        </li>

        @include('main_admin.includes.sidebar.orders')
        @include('main_admin.includes.sidebar.users')
        @include('main_admin.includes.sidebar.marketing')
        @include('main_admin.includes.sidebar.content')
        @include('main_admin.includes.sidebar.settings')
        @include('main_admin.includes.sidebar.administrator')
    </ul>
</aside>
