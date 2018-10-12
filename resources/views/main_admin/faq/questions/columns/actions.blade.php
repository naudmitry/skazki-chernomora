<div class="btn-group">
    <a
        href="{{ route('admin.faq.question.edit', '') }}/@{{faq.id}}"
        class="btn btn-primary"
    ><i class="fa fa-lg fa-edit" style="color: #FFF"></i></a>

    <a
        href="{{ route('admin.faq.question.delete', '') }}/@{{faq.id}}"
        class="btn btn-primary faq-question-delete"
    ><i class="fa fa-lg fa-trash" style="color: #FFF"></i></a>
</div>
