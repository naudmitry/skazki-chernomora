<div class="app-title">
    <div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            @if (isset($section))<li class="breadcrumb-item">{{ $section }}</li>@endif
            <li class="breadcrumb-item">{{ $page }}</li>
            {{--TODO: delete page, add menu and submenu--}}
        </ul>
    </div>
</div>
