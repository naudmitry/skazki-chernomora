<div class="tab-pane fade" id="admins">
    <div class="tile user-settings">
        <div class="tile-body datatable-scroll-lg">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Создан</th>
                    <th>Администратор</th>
                    <th>Событие</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($adminChangeHistory as $history)
                        <tr>
                            <td>{{ $history->created_at }}</td>
                            <td><a href="{{ route('admin.admins.edit', $history->historiable) }}">{{ $history->historiable->full_name }}</a></td>
                            <td>{{ App\Classes\EventHistoryEnum::$labels[$history->event] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>