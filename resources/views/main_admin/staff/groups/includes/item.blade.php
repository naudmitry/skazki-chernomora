<div
        class="staff-groups-list-item"
        data-staff-group-id="{{ $group->id }}"
        style="margin-bottom: 10px;display: flex;justify-content: space-between;flex-wrap: wrap;"
>
    <div class="toggle-flip" style="display: flex;justify-content: flex-start;flex-wrap: wrap;">
        <p class="title dragula-handle">{{ $group->title }}</p>
    </div>

    <div class="btn-group">
        <a
            class="btn btn-primary staff-group-settings-open"
            href="{{ route('admin.staff.group.edit', $group) }}"
        ><i class="fa fa-lg fa-edit"></i></a>

        <a
            class="btn btn-primary staff-group-delete"
            href="{{ route('admin.staff.group.delete', $group) }}"
        ><i class="fa fa-lg fa-trash"></i></a>
    </div>
</div>
