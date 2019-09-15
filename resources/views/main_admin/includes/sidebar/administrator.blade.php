@if (auth('admin')->user()->hasAccessTo(
[
    App\Classes\AdminComponentEnum::COMPANY_ADMIN_COMPANY,
    App\Classes\AdminComponentEnum::COMPANY_ADMIN_SHOWCASES,
    App\Classes\AdminComponentEnum::COMPANY_ADMIN_GROUPS,
    App\Classes\AdminComponentEnum::COMPANY_ADMIN_LIST,
    App\Classes\AdminComponentEnum::COMPANY_ADMIN_ROLES,
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Администратор</span></div>
    </li>

    @if (auth('admin')->user()->hasAccessTo(
    [
        App\Classes\AdminComponentEnum::COMPANY_ADMIN_GROUPS,
        App\Classes\AdminComponentEnum::COMPANY_ADMIN_LIST,
        App\Classes\AdminComponentEnum::COMPANY_ADMIN_ROLES,
    ], $administeredCompany))
        <li class="treeview @if (Route::is('admin.staff.*')) is-expanded scroll-here @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon far fa-file-alt"></i>
                <span class="app-menu__label">Персонал</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>

            <ul class="treeview-menu">
                @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_ADMIN_LIST, $administeredCompany))
                    <li>
                        <a
                            class="treeview-item @if (Route::is('admin.staff.list.*')) active @endif"
                            href="{{ route('admin.staff.list.index') }}"
                        ><i class="icon far fa-circle"></i>Список</a>
                    </li>
                @endif

                @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_ADMIN_ROLES, $administeredCompany))
                    <li>
                        <a
                            class="treeview-item @if (Route::is('admin.staff.roles')) active @endif"
                            href="{{ route('admin.staff.roles') }}"
                        ><i class="icon far fa-circle"></i>Роли</a>
                    </li>
                @endif

                @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_ADMIN_GROUPS, $administeredCompany))
                    <li>
                        <a
                            class="treeview-item @if (Route::is('admin.staff.group.*')) active @endif"
                            href="{{ route('admin.staff.group.index') }}"
                        ><i class="icon far fa-circle"></i>Группы</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    <li>
        <a
            class="app-menu__item @if (Route::is('admin.companies.*')) active scroll-here @endif"
            href="{{ route('admin.companies.lists.index') }}"
        ><i class="app-menu__icon fas fa-list"></i><span class="app-menu__label">Компании</span></a>
    </li>

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_ADMIN_COMPANY, $administeredCompany))
        <li>
            <a
                class="app-menu__item"
                href=""
            ><i class="app-menu__icon fas fa-cogs"></i><span class="app-menu__label">Компания</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_ADMIN_SHOWCASES, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.showcases.*')) active scroll-here @endif"
                href="{{ route('admin.showcases.index') }}"
            ><i class="app-menu__icon fas fa-map-marker-alt"></i><span class="app-menu__label">Сайты</span></a>
        </li>
    @endif
@endif