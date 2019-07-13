@if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(
[
    App\Classes\AdminComponentEnum::COMPANY_COMMUNICATION_HELPDESK
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Коммуникация</span></div>
    </li>

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_COMMUNICATION_HELPDESK, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.help-desks.*')) active @endif"
                href="{{ route('admin.help-desks.index') }}"
            ><i class="app-menu__icon fas fa-headset"></i><span class="app-menu__label">Help Desk</span></a>
        </li>
    @endif
@endif