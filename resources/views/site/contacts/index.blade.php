@extends('site.layouts.master')

@section('content')
    @include('site.vendor.pageHeader', [
        'page' => 'Контакты',
    ])

    <section class="section contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address-block">
                        <!-- Location -->
                        <div class="media">
                            <i class="far fa-map"></i>
                            <div class="media-body">
                                <h3>Расположение</h3>
                                <p>PO Box 16122 Collins Street West
                                    <br>Victoria 8007 Canada</p>
                            </div>
                        </div>
                        <!-- Phone -->
                        <div class="media">
                            <i class="fa fa-phone"></i>
                            <div class="media-body">
                                <h3>Телефон</h3>
                                <p>
                                    (+48) 564-334-21-22-34
                                    <br>(+48) 564-334-21-22-38
                                </p>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="media">
                            <i class="far fa-envelope"></i>
                            <div class="media-body">
                                <h3>Почта</h3>
                                <p>
                                    info@templatepath.com
                                    <br>info@cleanxer.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- address end -->
                </div>
                <div class="col-md-8">
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
        <div id="map"></div>
    </section>
@endsection
