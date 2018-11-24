@if ($administerableShowcases->count() && auth('admin')->user()->hasAccessTo(
[
    App\Classes\AdminComponentEnum::COMPANY_CONTENT_PAGES,
    App\Classes\AdminComponentEnum::COMPANY_CONTENT_BLOG,
    App\Classes\AdminComponentEnum::COMPANY_CONTENT_FAQ,
], $administeredCompany))
    <li>
        <div class="app-menu__header"><span class="app-menu__label">Контент</span></div>
    </li>

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_CONTENT_BLOG, $administeredCompany))
        <li class="treeview @if (Route::is('admin.blog.*')) is-expanded @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fas fa-newspaper"></i>
                <span class="app-menu__label">Новости</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>

            <ul class="treeview-menu">
                <li>
                    <a
                        class="treeview-item @if (Route::is('admin.blog.category.*')) active @endif"
                        href="{{ route('admin.blog.category.index') }}"
                    ><i class="icon far fa-circle"></i>Категории</a>
                </li>

                <li>
                    <a
                        class="treeview-item @if (Route::is('admin.blog.article.*')) active @endif"
                        href="{{ route('admin.blog.article.index') }}"
                    ><i class="icon far fa-circle"></i>Статьи</a>
                </li>
            </ul>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_CONTENT_FAQ, $administeredCompany))

        <li class="treeview @if (Route::is('admin.faq.*')) is-expanded @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fas fa-question"></i>
                <span class="app-menu__label">FAQ</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>

            <ul class="treeview-menu">
                <li>
                    <a
                        class="treeview-item @if (Route::is('admin.faq.category.*')) active @endif"
                        href="{{ route('admin.faq.category.index') }}"
                    ><i class="icon far fa-circle"></i>Категории</a>
                </li>

                <li>
                    <a
                        class="treeview-item @if (Route::is('admin.faq.question.*')) active @endif"
                        href="{{ route('admin.faq.question.index') }}"
                    ><i class="icon far fa-circle"></i>Вопросы</a>
                </li>
            </ul>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_CONTENT_PAGES, $administeredCompany))
        <li class="treeview @if (Route::is('admin.page.*')) is-expanded @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon far fa-file-alt"></i>
                <span class="app-menu__label">Страницы</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>

            <ul class="treeview-menu">
                <li>
                    <a
                        class="treeview-item @if (Route::is('admin.page.category.*')) active @endif"
                        href="{{ route('admin.page.category.index') }}"
                    ><i class="icon far fa-circle"></i>Категории</a>
                </li>

                <li>
                    <a
                        class="treeview-item @if (Route::is('admin.page.list.*')) active @endif"
                        href="{{ route('admin.page.list.index') }}"
                    ><i class="icon far fa-circle"></i>Список</a>
                </li>
            </ul>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_CONTENT_PAGES, $administeredCompany))
        <li>
            <a
                class="app-menu__item @if (Route::is('admin.main.*')) active @endif"
                href="{{ route('admin.main.index') }}"
            ><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Главная</span></a>
        </li>

        <li>
            <a
                class="app-menu__item @if (Route::is('admin.contacts.*')) active @endif"
                href="{{ route('admin.contacts.index') }}"
            ><i class="app-menu__icon fas fa-address-book"></i><span class="app-menu__label">Контакты</span></a>
        </li>
    @endif

    @if (auth('admin')->user()->hasAccessTo(App\Classes\AdminComponentEnum::COMPANY_CONTENT_BLOCKS, $administeredCompany))
        <li>
            <a
                class="app-menu__item"
                href="#"
            ><i class="app-menu__icon fas fa-chess-queen"></i><span class="app-menu__label">Header</span></a>
        </li>

        <li>
            <a
                class="app-menu__item"
                href="#"
            ><i class="app-menu__icon fas fa-shoe-prints"></i><span class="app-menu__label">Footer</span></a>
        </li>
    @endif
@endif