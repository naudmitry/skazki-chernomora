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
                        <h3>Коллекция фотографий
                            <span>соляных пещер</span>
                        </h3>
                        <p>Посмотрите наш дизайн соляных пещер и начните думать о своём здоровье прямо сейчас.
                            <br>Уют, комфорт и ошеломительный интерьер будет гарантирован.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-01.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-01.jpg"></a>
                        <h3>Facility 01</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-02.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-02.jpg"></a>
                        <h3>Facility 02</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-03.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-03.jpg"></a>
                        <h3>Facility 03</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-04.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-04.jpg"></a>
                        <h3>Facility 04</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-05.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-05.jpg"></a>
                        <h3>Facility 05</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="images/gallery/gallery-06.jpg" class="img-responsive" alt="gallery-image">
                        <a data-fancybox="images" href="images/gallery/gallery-06.jpg"></a>
                        <h3>Facility 06</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
