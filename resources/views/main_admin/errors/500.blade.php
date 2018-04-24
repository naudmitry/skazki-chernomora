@extends('main_admin.layouts.master')

@section('content')
    <div class="page-error tile">
        <h1>
            <i class="fa fa-exclamation-circle"></i> Ошибка 500: Internal Server Error
        </h1>
        <p>Внутренняя ошибка сервера.</p>
        <p>
            <a class="btn btn-primary" href="javascript:window.history.back();">Вернуться назад</a>
        </p>
    </div>
@endsection
