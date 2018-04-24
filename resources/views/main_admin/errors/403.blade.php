@extends('main_admin.layouts.master')

@section('content')
    <div class="page-error tile">
        <h1>
            <i class="fa fa-exclamation-circle"></i> Ошибка 403: Сервер понял запрос, но он отказывается его выполнять из-за ограничений в доступе для клиента к указанному ресурсу.
        </h1>
        <p>Клиент не уполномочен совершать операции с запрошенным ресурсом.</p>
        <p>
            <a class="btn btn-primary" href="javascript:window.history.back();">Вернуться назад</a>
        </p>
    </div>
@endsection
