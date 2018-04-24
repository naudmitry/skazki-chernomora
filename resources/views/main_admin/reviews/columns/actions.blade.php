<div class="btn-group">
    <a
        href="{{ route('admin.review.modal', '') }}/@{{review.id}}"
        class="btn btn-primary open-review-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.review.delete', '') }}/@{{review.id}}"
        class="btn btn-primary review-delete"
    ><i class="fas fa-trash"></i></a>
</div>
