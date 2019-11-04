<div class="dropdown">
    <a data-toggle="dropdown" href="#">
        <i class="fas fa-ellipsis-h"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('admin.buyers.edit', '@buyerId') }}">
            <i class="fas fa-edit mr-2"></i>Изменить
        </a>
        <a class="dropdown-item" href="{{ route('admin.buyers.destroy', '@buyerId') }}">
            <i class="fas fa-trash-alt mr-2"></i>Удалить
        </a>
    </div>
</div>