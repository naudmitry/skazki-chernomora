<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img
            class="app-sidebar__user-avatar"
            src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
            alt="User Image"
        >
        <div>
            <p class="app-sidebar__user-name">{{ Auth::guard('admin')->user()->name }} {{ Auth::guard('admin')->user()->surname }}</p>
            <p class="app-sidebar__user-designation">{{ Auth::guard('admin')->user()->position }}</p>
        </div>
    </div>

    <ul class="app-menu">
        <li>
            <a class="app-menu__item @if (Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">
                <i class="app-menu__icon fas fa-tachometer-alt"></i>
                <span class="app-menu__label">Панель управления</span>
            </a>
        </li>

        @include('admin.includes.sidebar.users')
        @include('admin.includes.sidebar.content')
        @include('admin.includes.sidebar.settings')
        @include('admin.includes.sidebar.administrator')
    </ul>
</aside>
