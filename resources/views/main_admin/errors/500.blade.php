@extends('main_admin.layouts.master')

@section('content')
    <div class="page-error tile">
        <h1>
            <i class="fa fa-exclamation-circle"></i> Ошибка 500: Страница не найдена
        </h1>
        <p>Запрошенная страница не найдена.</p>
        <p>
            <a class="btn btn-primary" href="javascript:window.history.back();">Вернуться назад</a>
        </p>
    </div>
@endsection
