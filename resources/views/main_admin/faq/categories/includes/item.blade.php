<div class="faq-categories-list-item list-items-container" data-faq-category-id="{{ $category->id }}">
    <div class="toggle-flip title-center">
        <div class="toggle">
            <label class="mb-0">
                <input
                        class="checkbox"
                        type="checkbox"
                        @if ($category->enable) checked @endif
                        data-href="{{ route('admin.faq.category.enable', $category) }}"
                ><span class="button-indecator"></span>
            </label>
        </div>

        <p class="title dragula-handle mb-0">
            <a class="faq-category-settings-open" href="{{ route('admin.faq.category.edit', $category) }}">
                {{ $category->title }}
            </a>
        </p>
    </div>
    <div class="toggle-flip title-center">
        <a class="dragula-handle mr-2" href="#">
            <i class="fas fa-arrows-alt dragula-handle" style="vertical-align: middle;"></i>
        </a>
        <a class="faq-category-delete" href="{{ route('admin.faq.category.delete', $category) }}">
            <i class="fas fa-trash-alt mr-2"></i>
        </a>
    </div>
</div>
