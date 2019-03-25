@if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(
[
    App\Classes\AdminComponentEnum::COMPANY_USERS_CUSTOMERS,
    App\Classes\AdminComponentEnum::COMPANY_USERS_REVIEWS,
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Пользователи</span></div>
    </li>

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_USERS_CUSTOMERS, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.buyer.*')) active @endif"
                href="{{ route('admin.buyer.list.index') }}"
            ><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Клиенты</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_USERS_REVIEWS, $administeredCompany))
        <li>
            <a
                class="app-menu__item"
                href="#"
            ><i class="app-menu__icon fas fa-medal"></i><span class="app-menu__label">Отзывы</span></a>
        </li>
    @endif

    <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fas fa-newspaper"></i>
            <span class="app-menu__label">Справочники</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
        </a>

        <ul class="treeview-menu">
            <li>
                <a
                    class="treeview-item @if (Route::is('admin.ad-source.*')) active @endif"
                    href="{{ route('admin.ad-source.list.index') }}"
                ><i class="icon far fa-circle"></i>Источники</a>
            </li>
        </ul>

        <ul class="treeview-menu">
            <li>
                <a
                    class="treeview-item"
                    href="#"
                ><i class="icon far fa-circle"></i>Диагнозы</a>
            </li>
        </ul>

        <ul class="treeview-menu">
            <li>
                <a
                    class="treeview-item"
                    href="#"
                ><i class="icon far fa-circle"></i>Жалобы</a>
            </li>
        </ul>
    </li>
@endif