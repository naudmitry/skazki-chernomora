@extends('miracle.layouts.master')

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('header__ss')
    <link rel="stylesheet" href="{{ asset('miracle/css/black-header.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="col-md-8 center-block text-center block">
            <div class="heading-box">
                <h2 class="box-title">Напишите нам</h2>
                <p class="desc-lg">Не стесняйтесь написать нам сообщение</p>
            </div>
            <form>
                <div class="row">
                    <div class="form-group col-sms-6 col-sm-6">
                        <input type="text" class="input-text full-width" placeholder="Имя">
                    </div>
                    <div class="form-group col-sms-6 col-sm-6">
                        <input type="text" class="input-text full-width" placeholder="Фамилия">
                    </div>
                    <div class="form-group col-sms-6 col-sm-6">
                        <input type="text" class="input-text full-width" placeholder="Email">
                    </div>
                    <div class="form-group col-sms-6 col-sm-6">
                        <input type="text" class="input-text full-width" placeholder="Номер телефона">
                    </div>
                </div>
                <div class="form-group">
                    <textarea rows="10" class="input-text full-width" placeholder="Текст сообщения"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md style1">Отправить сообщение</button>
                </div>
            </form>
        </div>
    </div>
@endsection