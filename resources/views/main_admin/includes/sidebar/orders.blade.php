@if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(
[
    App\Classes\AdminComponentEnum::COMPANY_ORDERS_LIST,
    App\Classes\AdminComponentEnum::COMPANY_ORDERS_PRE_ENTRY,
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Заказы</span></div>
    </li>

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_ORDERS_LIST, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.order.*')) active @endif"
                href="{{ route('admin.order.list.index') }}"
            ><i class="app-menu__icon fas fa-shopping-cart"></i><span class="app-menu__label">Список заказов</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_ORDERS_PRE_ENTRY, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.pre-entry.*')) active @endif"
                href="{{ route('admin.pre-entry.index') }}"
            ><i class="app-menu__icon fas fa-list"></i><span class="app-menu__label">Запись на прием</span></a>
        </li>
    @endif
@endif