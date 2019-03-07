<ul class="breadcrumbs">
    <li><a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::MAIN_PAGE, [], $showcase->id) }}">{{ $mainPage->breadcrumbs }}</a></li>
    {{--<li><a href="#">PAGES</a></li>--}}
    <li class="active">{{ $currentPage->breadcrumbs }}</li>
</ul>