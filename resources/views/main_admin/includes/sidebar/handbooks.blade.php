@if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(
[
    App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_AD_SOURCES,
    App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_PRIVILEGES,
    App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_DIAGNOSES,
    App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_COMPLAINTS,
    App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_SUBSCRIPTIONS,
    App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_ORGANIZATIONS,
    App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_SALT_CAVES,
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Справочники</span></div>
    </li>

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_AD_SOURCES, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.ad-sources.*')) active scroll-here @endif"
                href="{{ route('admin.ad-sources.index') }}"
            ><i class="app-menu__icon fas fa-ad"></i><span class="app-menu__label">Источники рекламы</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_PRIVILEGES, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.privileges.*')) active scroll-here @endif"
                href="{{ route('admin.privileges.index') }}"
            ><i class="app-menu__icon fas fa-crown"></i><span class="app-menu__label">Льготы</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_DIAGNOSES, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.diagnoses.*')) active scroll-here @endif"
                href="{{ route('admin.diagnoses.index') }}"
            ><i class="app-menu__icon fas fa-diagnoses"></i><span class="app-menu__label">Диагнозы</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_COMPLAINTS, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.complaints.*')) active scroll-here @endif"
                href="{{ route('admin.complaints.index') }}"
            ><i class="app-menu__icon fas fa-notes-medical"></i><span class="app-menu__label">Жалобы</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_SUBSCRIPTIONS, $administeredCompany))
        <li>
            <a
                    class="app-menu__item @if (Route::is('admin.subscription.*')) active scroll-here @endif"
                    href="{{ route('admin.subscription.index') }}"
            ><i class="app-menu__icon fas fa-ticket-alt"></i><span class="app-menu__label">Абонементы</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_ORGANIZATIONS, $administeredCompany))
        <li>
            <a
                    class="app-menu__item @if (Route::is('admin.organization.*')) active scroll-here @endif"
                    href="{{ route('admin.organization.index') }}"
            ><i class="app-menu__icon fas fa-building"></i><span class="app-menu__label">Организации</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_HANDBOOKS_SALT_CAVES, $administeredCompany))
        <li>
            <a
                    class="app-menu__item @if (Route::is('admin.salt-caves.*')) active scroll-here @endif"
                    href="{{ route('admin.salt-caves.index') }}"
            ><i class="app-menu__icon fas fa-store-alt"></i><span class="app-menu__label">Соляные пещеры</span></a>
        </li>
    @endif
@endif