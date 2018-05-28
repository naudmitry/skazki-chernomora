<div class="app-title">
    <div>
        <h1><i class="fa fa-home"></i> {{ $page }}</h1>
        <p>{{ $description }}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        @if (isset($section))<li class="breadcrumb-item">{{ $section }}</li>@endif
        <li class="breadcrumb-item"><a href="#">{{ $page }}</a></li>
    </ul>
</div>
