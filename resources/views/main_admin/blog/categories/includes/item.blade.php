<div
        class="blog-categories-list-item list-items-container"
        data-blog-category-id="{{ $category->id }}"
>
    <div class="toggle-flip title-center">
        <label class="checkbox-left">
            <input
                    class="checkbox"
                    type="checkbox"
                    data-href="{{ route('admin.blog.category.enable', $category) }}"
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
            class="btn btn-primary blog-category-settings-open"
            href="{{ route('admin.blog.category.edit', $category) }}"
        ><i class="fa fa-lg fa-edit"></i></a>

        <a
            class="btn btn-primary blog-category-delete"
            href="{{ route('admin.blog.category.delete', $category) }}"
        ><i class="fa fa-lg fa-trash"></i></a>
    </div>
</div>
