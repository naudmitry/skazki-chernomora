<!-- Navbar-->
<header class="app-header">
    <a class="app-header__logo" href="javascript:;">Sacave</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar">
        <i class="fas fa-bars" style="margin-top: 20px;"></i>
    </a>

    <ul class="app-nav">
        <div class="flex-left">
            {{--@if (array_search(\App\Classes\AdminComponentEnum::SUPER_ADMIN_COMPANIES, auth('admin')->user()->role->components))--}}
                @include('main_admin.includes.switch_companies', ['companies' => auth('admin')->user()->companies, 'admin' => auth('admin')->user()])
            {{--@endif--}}

            @if ($administerableShowcases->count() && $administeredShowcase)
                @include('main_admin.includes.switch_showcases')
            @endif
        </div>


        <div class="flex-right">
            <li class="dropdown">
                <a class="app-nav__item" href="javascript:;" data-toggle="dropdown">
                    <i class="fas fa-user"></i>
                    <div class="d-none d-md-block">
                        <span>{{ auth('admin')->user()->full_name }}</span>
                        <i class="fas fa-caret-down"></i>
                    </div>
                </a>

                <ul class="app-notification dropdown-menu dropdown-menu-rigth">
                    <div class="app-notification__content">
                        <li>
                            <a class="app-notification__item" href="#">
                                <span class="app-notification__icon">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-users-cog"></i>
                                    </span>
                                </span>
                                <div>
                                    <p class="app-notification__message">Профиль</p>
                                    <p class="app-notification__meta">Открыть настройки</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="app-notification__item" href="{{ route('account.logout') }}">
                                    <span class="app-notification__icon">
                                        <span class="fa-stack fa-lg">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </span>
                                    </span>
                                <div>
                                    <p class="app-notification__message">Выйти</p>
                                    <p class="app-notification__meta">Завершить текущий сеанс</p>
                                </div>
                            </a>
                        </li>
                    </div>
                </ul>
            </li>
        </div>
    </ul>
</header>
