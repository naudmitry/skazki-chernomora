<div class="btn-group">
    <a
        href="{{ route('admin.help-desks.open-modal', '') }}/@{{helpdesk.id}}"
        class="btn btn-primary help-desks-update-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.help-desks.destroy', '') }}/@{{helpdesk.id}}"
        class="btn btn-primary help-desks-destroy"
    ><i class="fas fa-trash"></i></a>
</div>
