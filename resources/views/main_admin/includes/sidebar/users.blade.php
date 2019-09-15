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
                class="app-menu__item @if (Route::is('admin.reviews.*')) active @endif"
                href="{{ route('admin.reviews.index') }}"
            ><i class="app-menu__icon fas fa-medal"></i><span class="app-menu__label">Отзывы</span></a>
        </li>
    @endif
@endif