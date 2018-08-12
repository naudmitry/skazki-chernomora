<div class="col-md-3 col-sm-12 col-xs-12">
    <div class="right-side">
        <div class="text-title">
            <h6>Поиск</h6>
        </div>
        <div class="search-box">
            <form method="post" action="#">
                <input type="search" name="search" placeholder="Введите для поиска" required>
            </form>
        </div>
        <div class="categorise-menu">
            <div class="text-title">
                <h6>Категории</h6>
            </div>
            <ul class="categorise-list">
                @foreach ($categories as $category)
                    <li>
                        <a
                            href="{{ $category->getShowcaseUrl() }}"
                            @if (isset($currentCategory) && $category->id == $currentCategory->id) style="color: #48bdc5;" @endif
                        >{{ $category->name }} <span>({{ $category->getCountBlogs() }})</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{--<div class="tag-list">--}}
        {{--<div class="text-title">--}}
        {{--<h6>Tags</h6>--}}
        {{--</div>--}}
        {{--<a href="#">ray</a><a href="#">dental</a>--}}
        {{--<a href="#">Clean</a><a href="#">hospitality</a>--}}
        {{--<a href="#">Dormamu</a><a href="#">Medical</a><a href="#">hospitality</a>--}}
        {{--</div>--}}
    </div>
</div>
