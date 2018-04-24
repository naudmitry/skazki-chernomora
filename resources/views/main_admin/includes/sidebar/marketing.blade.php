@if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(
[
    App\Classes\AdminComponentEnum::COMPANY_MARKETING_DISCOUNTS
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Маркетинг</span></div>
    </li>

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_MARKETING_DISCOUNTS, $administeredCompany))
        <li>
            <a
                class="app-menu__item"
                href="#"
            ><i class="app-menu__icon fas fa-percent"></i><span class="app-menu__label">Скидки</span></a>
        </li>
    @endif
@endif