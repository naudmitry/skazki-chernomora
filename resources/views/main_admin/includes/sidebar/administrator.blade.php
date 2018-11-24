<li>
    <div class="app-menu__header"><span class="app-menu__label">Администратор</span></div>
</li>

<li>
    <a
        class="app-menu__item"
        href="{{ route('admin.companies.lists.index') }}"
    ><i class="app-menu__icon fas fa-list"></i><span class="app-menu__label">Компании</span></a>
</li>

<li>
    <a
        class="app-menu__item"
        href=""
    ><i class="app-menu__icon fas fa-cogs"></i><span class="app-menu__label">Компания</span></a>
</li>

<li>
    <a
        class="app-menu__item"
        href="{{ route('admin.showcases.index') }}"
    ><i class="app-menu__icon fas fa-map-marker-alt"></i><span class="app-menu__label">Сайты</span></a>
</li>

<li class="treeview">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon far fa-file-alt"></i>
        <span class="app-menu__label">Персонал</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
    </a>

    <ul class="treeview-menu">
        <li>
            <a
                class="treeview-item @if (Route::is('admin.admin.list.*')) active @endif"
                href="{{ route('admin.admin.list.index') }}"
            ><i class="icon far fa-circle"></i>Список</a>
        </li>
        <li>
            <a
                class="treeview-item"
                href="#"
            ><i class="icon far fa-circle"></i>Роли</a>
        </li>
        <li>
            <a
                class="treeview-item"
                href="#"
            ><i class="icon far fa-circle"></i>Группы</a>
        </li>
    </ul>
</li>