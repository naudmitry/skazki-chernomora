<div class="page-categories-list-item list-items-container" data-page-category-id="{{ $category->id }}">
    <div class="toggle-flip title-center">
        <div class="toggle">
            <label class="mb-0">
                <input
                        class="checkbox"
                        type="checkbox"
                        @if ($category->enable) checked @endif
                        data-href="{{ route('admin.page.category.enable', $category) }}"
                ><span class="button-indecator"></span>
            </label>
        </div>

        <p class="title dragula-handle mb-0">
            <a class="page-category-settings-open" href="{{ route('admin.page.category.edit', $category) }}">
                {{ $category->title }}
            </a>
        </p>
    </div>
    <div class="toggle-flip title-center">
        <a class="dragula-handle mr-2" href="#">
            <i class="fas fa-arrows-alt dragula-handle" style="vertical-align: middle;"></i>
        </a>
        <a class="page-category-delete" href="{{ route('admin.page.category.delete', $category) }}">
            <i class="fas fa-trash-alt mr-2"></i>
        </a>
    </div>
</div>
