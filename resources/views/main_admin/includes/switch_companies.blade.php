@if (isset($companies) && ($companies->count() > 0))
    <li class="dropdown switch-companies">
        <a class="app-nav__item" href="javascript:;" data-toggle="dropdown">
            <i class="fas fa-globe"></i>
            <div class="d-none d-md-block">
                <span>{{ $administeredCompany->super ? 'Компании' : $administeredCompany->title }}</span>
                <i class="fas fa-caret-down"></i>
            </div>
        </a>

        <ul class="app-notification dropdown-menu dropdown-menu-rigth">
            <div class="app-notification__content">
                @if (auth('admin')->user()->super && !auth('admin')->user()->company->is($administeredCompany))
                    <li>
                        <a class="app-notification__item switch-companies-perform" href="{{ route('admin.companies.leave-from-admin') }}">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="far fa-arrow-alt-circle-left"></i>
                                </span>
                            </span>
                            <div style="display: flex">
                                <p style="margin: auto" class="app-notification__message">Вернуться в суперкомпанию</p>
                            </div>
                        </a>
                    </li>
                @endif

                @foreach ($companies->sortBy('title') as $company)
                    <li>
                        <a
                            class="app-notification__item switch-companies-perform"
                            href="{{ route('admin.companies.enter-as-admin', $company) }}"
                            data-company-id="{{ $company->id }}"
                        >
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-globe"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">{{ $company->title }}</p>
                                <p class="app-notification__meta">10 новых заказов</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </div>

            <li class="app-notification__footer">
                <a href="{{ route('admin.companies.lists.index') }}">Посмотреть все</a>
            </li>
        </ul>
    </li>
@endif