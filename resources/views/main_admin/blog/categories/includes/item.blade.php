<div class="blog-categories-list-item list-items-container" data-blog-category-id="{{ $category->id }}">
    <div class="toggle-flip title-center">
        <label class="checkbox-left">
            <input
                    class="checkbox"
                    type="checkbox"
                    data-href="{{ route('admin.blog.categories.enable', $category) }}"
                    @if ($category->enable) checked @endif
            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
        </label>

        <p class="title dragula-handle mb-0">
            <a class="blog-category-settings-open" href="{{ route('admin.blog.categories.edit', $category) }}">
                {{ $category->title }}
            </a>
        </p>
    </div>
    <div class="toggle-flip title-center">
        <a class="dragula-handle mr-2" href="#">
            <i class="fas fa-arrows-alt dragula-handle" style="vertical-align: middle;"></i>
        </a>
        <a class="blog-category-delete" href="{{ route('admin.blog.categories.destroy', $category) }}">
            <i class="fas fa-trash-alt mr-2"></i>
        </a>
    </div>
</div>
