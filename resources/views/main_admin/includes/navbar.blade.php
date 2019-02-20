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
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="far fa-user"></i>
                </a>

                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cog fas-lg"></i> Настройки
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fas-lg"></i> Профиль
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('account.logout') }}">
                            <i class="fas fa-sign-out-alt fas-lg"></i> Выйти
                        </a>
                    </li>
                </ul>
            </li>
        </div>
    </ul>
</header>
