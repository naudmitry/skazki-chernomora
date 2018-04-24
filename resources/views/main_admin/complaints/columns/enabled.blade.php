<div class="toggle-flip">
    <label>
        <input
                class="checkbox complaint-enabled"
                data-href="{{ route('admin.complaints.enable', '@complaintId') }}"
                type="checkbox"
                @{{#complaint.is_enabled}} checked @{{/complaint.is_enabled}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>