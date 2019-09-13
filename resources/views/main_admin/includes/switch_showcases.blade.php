<li class="dropdown">
    <a class="app-nav__item" href="javascript:;" data-toggle="dropdown">
        <i class="fas fa-globe-asia" data-href="{{ $administeredShowcase->http_origin }}"></i>
        <div class="d-none d-md-block">
            <span>{{ $administeredShowcase->title }}</span>
            <i class="fas fa-caret-down"></i>
        </div>
    </a>

    <ul class="app-notification dropdown-menu dropdown-menu-rigth">
        <div class="app-notification__content">
            @foreach ($administerableShowcases->sortBy('title') as $showcase)
                <li>
                    <a
                        class="app-notification__item"
                        href="{{ route(request()->route()->getName(), ['administeredShowcase' => $showcase] + request()->route()->parameters()) }}"
                    >
                        <span class="app-notification__icon">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-globe-asia button-link-target-blank" data-href="{{ $showcase->http_origin }}"></i>
                            </span>
                        </span>
                        <div>
                            <p class="app-notification__message">{{ $showcase->title }}</p>
                            <p class="app-notification__meta">{{ $showcase->domain }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </div>

        <li class="app-notification__footer">
            <a href="{{ route('admin.showcases.index') }}">Посмотреть все</a>
        </li>
    </ul>
</li>
