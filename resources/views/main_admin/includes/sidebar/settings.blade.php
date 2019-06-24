@if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo([
    App\Classes\AdminComponentEnum::COMPANY_SETTINGS_GENERAL,
    App\Classes\AdminComponentEnum::COMPANY_SETTINGS_PRICING,
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Настройки</span></div>
    </li>

    @if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_SETTINGS_GENERAL, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.settings.*')) active @endif"
                href="{{ route('admin.settings.index') }}"
            ><i class="app-menu__icon fas fa-cog"></i><span class="app-menu__label">Общие</span></a>
        </li>
    @endif

    @if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_SETTINGS_PRICING, $administeredCompany))
        <li>
            <a
                class="app-menu__item"
                href="#"
            ><i class="app-menu__icon fas fa-coins"></i><span class="app-menu__label">Оплата</span></a>
        </li>
    @endif

    @if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_SETTINGS_SEO_INTEGRATION, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.seo-integrations.*')) active @endif"
                href="{{ route('admin.seo-integrations.index') }}"
            ><i class="app-menu__icon fas fa-chart-line"></i><span class="app-menu__label">SEO & интеграция</span></a>
        </li>
    @endif
@endif