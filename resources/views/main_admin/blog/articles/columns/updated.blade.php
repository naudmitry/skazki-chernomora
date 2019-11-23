<div>
    @{{blog.formatUpdatedAt}}
</div>
<a href="{{ route('admin.admins.edit', '@authorId') }}">
    @{{blog.updater.full_name}}
</a>