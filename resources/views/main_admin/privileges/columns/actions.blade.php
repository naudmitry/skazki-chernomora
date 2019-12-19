<div class="dropdown dropleft">
    <a data-toggle="dropdown" href="#">
        <i class="fas fa-ellipsis-h"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item open-edit-modal" href="{{ route('admin.privileges.edit', '@privilegeId') }}">
            <i class="fas fa-edit mr-2"></i>Изменить
        </a>
        <a class="dropdown-item item-delete" href="{{ route('admin.privileges.destroy', '@privilegeId') }}">
            <i class="fas fa-trash-alt mr-2"></i>Удалить
        </a>
    </div>
</div>