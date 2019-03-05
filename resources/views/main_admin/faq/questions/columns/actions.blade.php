<div class="btn-group">
    <a
        href="{{ route('admin.faq.question.edit', '') }}/@{{faq.id}}"
        class="btn btn-primary"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.faq.question.delete', '') }}/@{{faq.id}}"
        class="btn btn-primary faq-question-delete"
    ><i class="fas fa-trash"></i></a>
</div>
