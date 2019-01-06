@if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(
[
    App\Classes\AdminComponentEnum::COMPANY_ORDERS_LIST,
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Заказы</span></div>
    </li>

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_ORDERS_LIST, $administeredCompany))
        <li>
            <a
                class="app-menu__item"
                href="{{ route('admin.order.list.index') }}"
            ><i class="app-menu__icon fas fa-shopping-cart"></i><span class="app-menu__label">Список заказов</span></a>
        </li>
    @endif
@endif