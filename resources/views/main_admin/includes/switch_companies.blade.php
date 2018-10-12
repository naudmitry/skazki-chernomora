@if (isset($companies) && ($companies->count() > 0))
    <li class="dropdown">
        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
            <i class="fas fa-globe"></i>
            <span>Компании</span>
            <i class="fas fa-caret-down"></i>
        </a>

        <ul class="app-notification dropdown-menu dropdown-menu-rigth">
            <div class="app-notification__content">
                {{--@if (auth('admin')->user()->super && !auth('admin')->user()->company->is($administeredCompany))--}}
                    {{--<li>--}}
                        {{--<a class="app-notification__item" href="javascript:;">--}}
                            {{--<span class="app-notification__icon">--}}
                                {{--<span class="fa-stack fa-lg">--}}
                                    {{--<i class="fa fa-circle fa-stack-2x text-primary"></i>--}}
                                    {{--<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>--}}
                                {{--</span>--}}
                            {{--</span>--}}
                            {{--<div>--}}
                                {{--<p class="app-notification__message">Вернуться в суперкомпанию</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}

                @foreach ($companies as $company)
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-envelope fa-stack-1x fa-globe"></i>
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
                <a href="#">Посмотреть все</a>
            </li>
        </ul>
    </li>
@endif