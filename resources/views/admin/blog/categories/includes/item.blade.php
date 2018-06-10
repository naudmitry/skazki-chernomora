<div class="tile-title-w-btn blog-categories-list-item" data-blog-category-id="{{ $category->id }}">
    <p class="title">{{ $category->title }}</p>

    <div class="btn-group">
        <a class="btn btn-primary" href="#">
            <i class="fas fa-arrows-alt"></i>
        </a>

        <a
            class="btn btn-primary blog-categories-settings-open"
            href="{{ route('admin.blog.categories.edit', $category) }}"
        ><i class="fa fa-lg fa-edit"></i></a>

        <a
            class="btn btn-primary blog-category-delete"
            href="{{ route('admin.blog.categories.delete', $category) }}"
        ><i class="fa fa-lg fa-trash"></i></a>
    </div>
</div>
