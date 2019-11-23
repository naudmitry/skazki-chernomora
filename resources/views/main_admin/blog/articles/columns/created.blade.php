<div>
    @{{blog.formatCreatedAt}}
</div>
<a href="{{ route('admin.admins.edit', '@authorId') }}">
    @{{blog.author.full_name}}
</a>