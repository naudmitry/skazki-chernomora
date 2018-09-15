<li>
    <div class="app-menu__header"><span class="app-menu__label">Настройки</span></div>
</li>

<li>
    <a
        class="app-menu__item @if (Route::is('admin.settings.*')) active @endif"
        href="{{ route('admin.settings.index') }}"
    ><i class="app-menu__icon fas fa-cog"></i><span class="app-menu__label">Общие</span></a>
</li>

<li>
    <a
        class="app-menu__item"
        href="{{ route('admin.settings.index') }}"
    ><i class="app-menu__icon fas fa-coins"></i><span class="app-menu__label">Оплата</span></a>
</li>