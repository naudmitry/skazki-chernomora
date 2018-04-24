@extends('main_admin.layouts.master')

@section('content')
    <div class="page-error tile">
        <h1>
            <i class="fa fa-exclamation-circle"></i> Ошибка 503: Service Unavailable
        </h1>
        <p>Сервер временно не имеет возможности обрабатывать запросы по техническим причинам (обслуживание, перегрузка и прочее).</p>
        <p>
            <a class="btn btn-primary" href="javascript:window.history.back();">Вернуться назад</a>
        </p>
    </div>
@endsection
