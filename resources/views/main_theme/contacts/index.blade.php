@extends('main_theme.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $staticPage->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $staticPage->meta_keywords ?? '' }}"/>
    <title>{{ $staticPage->meta_title ?: 'Главная' }}</title>
@endsection

@section('content')
    @include('main_theme.vendor.navigation', [
        'page' => $staticPage->breadcrumbs ?? 'Контакты',
    ])

    <section class="section contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-form">
                        <!-- contact form start -->
                        <form action="#" class="row">
                            <!-- name -->
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control main" placeholder="Имя" required>
                            </div>
                            <!-- email -->
                            <div class="col-md-6">
                                <input type="email" class="form-control main" placeholder="Email" required>
                            </div>
                            <!-- phone -->
                            <div class="col-md-12">
                                <input type="text" class="form-control main" placeholder="Телефон" required>
                            </div>
                            <!-- message -->
                            <div class="col-md-12">
                                <textarea name="message" rows="15" class="form-control main" placeholder="Ваше сообщение"></textarea>
                            </div>
                            <!-- submit button -->
                            <div class="col-md-12 text-right">
                                <button class="btn btn-style-one" type="submit">Отправить сообщение</button>
                            </div>
                        </form>
                        <!-- contact form end -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af4bd7f8a6f29ad2345e9a79ffe041a979eaa13cde7bccc2c9b22cdcee87e92db&amp;source=constructor" width="100%" height="600" frameborder="0"></iframe>
    </section>
@endsection
