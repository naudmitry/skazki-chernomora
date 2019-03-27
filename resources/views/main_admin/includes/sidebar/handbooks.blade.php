<li>
    <div class="app-menu__header"><span class="app-menu__label">Справочники</span></div>
</li>

<li>
    <a
        class="app-menu__item @if (Route::is('admin.ad-source.*')) active @endif"
        href="{{ route('admin.ad-source.list.index') }}"
    ><i class="app-menu__icon fas fa-ad"></i><span class="app-menu__label">Источники рекламы</span></a>
</li>

<li>
    <a
        class="app-menu__item @if (Route::is('admin.diagnosis.*')) active @endif"
        href="{{ route('admin.diagnosis.list.index') }}"
    ><i class="app-menu__icon fas fa-diagnoses"></i><span class="app-menu__label">Диагнозы</span></a>
</li>

<li>
    <a
        class="app-menu__item @if (Route::is('admin.complaint.*')) active @endif"
        href="{{ route('admin.complaint.list.index') }}"
    ><i class="app-menu__icon fas fa-notes-medical"></i><span class="app-menu__label">Жалобы</span></a>
</li>