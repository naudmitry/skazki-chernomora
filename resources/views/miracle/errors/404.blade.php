@extends('miracle.layouts.master')

@section('body-data')
    class="error404"
@endsection

@section('header__ss')
    <link rel="stylesheet" href="{{ asset('miracle/css/404.css') }}">
@endsection

@section('content')
    <div class="container">
        <div id="main" class="col-md-10 col-lg-8">
            <hr class="color-light1 box-lg">
            <div class="heading-box">
                <h2 class="box-title">Страница не найдена</h2>
                <p class="desc-sm">Пожалуйста вернитесь или выберите любую страницу из меню ниже</p>
            </div>
            <div class="error-message-404 block"><span></span></div>
            <hr class="color-light1 box-lg">
            <a href="javascript:window.history.back();" class="btn btn-md style4 btn-go-back">Вернуться назад</a>
        </div>
    </div>
@endsection
