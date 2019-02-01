<div
        class="page-categories-list-item list-items-container"
        data-page-category-id="{{ $category->id }}"
>
    <div class="toggle-flip title-center">
        <label class="checkbox-left">
            <input
                    class="checkbox"
                    type="checkbox"
                    data-href="{{ route('admin.page.category.enable', $category) }}"
                    @if ($category->enable) checked @endif
            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
        </label>

        <p class="title dragula-handle" style="margin-bottom: 0;">{{ $category->title }}</p>
    </div>

    <div class="btn-group">
        <a class="btn btn-primary dragula-handle" href="#">
            <i class="fas fa-arrows-alt dragula-handle" style="vertical-align: middle;"></i>
        </a>

        <a
            class="btn btn-primary page-category-settings-open"
            href="{{ route('admin.page.category.edit', $category) }}"
        ><i class="fas fa-edit"></i></a>

        <a
            class="btn btn-primary page-category-delete"
            href="{{ route('admin.page.category.delete', $category) }}"
        ><i class="fas fa-trash"></i></a>
    </div>
</div>
