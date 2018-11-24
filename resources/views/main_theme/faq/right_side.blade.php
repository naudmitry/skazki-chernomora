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
                            href="{{ $category->getRoute() }}"
                            @if (isset($currentCategory) && $category->id == $currentCategory->id) style="color: #48bdc5;" @endif
                        >{{ $category->name }} <span>({{ $category->countFaqs }})</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
