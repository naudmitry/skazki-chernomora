@extends('main_theme.layouts.master')

@section('header__meta')
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>{{ 'Галерея' }}</title>
@endsection

@section('content')
    @include('main_theme.vendor.pageHeader', [
        'page' => 'Галерея',
    ])

    <section class="gallery bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Экскурсия
                            <span>по соляным пещерам</span>
                        </h3>
                        <p>Посмотрите наш дизайн соляных пещер и начните думать о своём здоровье прямо сейчас.
                            <br>Уют, комфорт и ошеломительный интерьер будет гарантирован.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-01.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-01.jpg"></a>
                        <h3>Фото 1</h3>
                        <p>Для самых маленьких наших посетителей – забавные мультфильмы.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-02.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-02.jpg"></a>
                        <h3>Фото 2</h3>
                        <p>Кому-то по душе расположиться в шезлонге, а кто-то предпочтет игру в «соляной песочнице».</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-03.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-03.jpg"></a>
                        <h3>Фото 3</h3>
                        <p>Шезлонги выполнены из экологичного материала – массива дерева.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-04.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-04.jpg"></a>
                        <h3>Фото 4</h3>
                        <p>Игрушки и «соляная песочница» - вовлекают в игру и маленьких и взрослых.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-05.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-05.jpg"></a>
                        <h3>Фото 5</h3>
                        <p>Сыпучий «соляный песочек» - развивает фантазию и мелкую моторику.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-06.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-06.jpg"></a>
                        <h3>Фото 6</h3>
                        <p>Дорожка и песочница выложены кирпичами из гималайской соли.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
