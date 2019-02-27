<footer class="footer-main">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="about-widget">
                        <div class="footer-logo">
                            <figure>
                                <a href="index.html">
                                    <img src="{{ URL::to('/images/logo-2.png') }}" alt="">
                                </a>
                            </figure>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, temporibus?</p>
                        <ul class="location-link">
                            <li class="item">
                                <i class="fa fa-map-marker-alt"></i>
                                <p>Modamba, NY 80021, United States</p>
                            </li>
                            <li class="item">
                                <i class="far fa-envelope" aria-hidden="true"></i>
                                <a href="#">
                                    <p>Support@medic.com</p>
                                </a>
                            </li>
                            <li class="item">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p>(88017) +123 4567</p>
                            </li>
                        </ul>
                        <ul class="list-inline social-icons">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <h6>Услуги</h6>
                    <ul class="menu-link">
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>Orthopadic Liabilities
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>Dental Clinic
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>Dormamu Clinic
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>Psycological Clinic
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>Gynaecological Clinic
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="social-links">
                        <h6>Важные новости</h6>
                        <ul>
                            <li class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="javascript:;">
                                            <img height="80" width="80" class="media-object" src="https://galoportal.ru/wp-content/uploads/2017/03/doctor-sol-5.jpg" alt="post-thumb">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="javascript:;">Открытие соляной пещеры</a></h4>
                                        <p>Открытие четвёртой соляной пещеры «Черноморская сказка» 28 августа.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="javascript:;">
                                            <img height="80" width="80" class="media-object" src="https://vitebsk.biz/source/photos/2018/10/10/2.jpeg" alt="post-thumb">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="javascript:;">Светильники</a></h4>
                                        <p>Теперь можно приобрести светильники из гималайской соли!</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container clearfix">
            <div class="copyright-text">
                <p>&copy; "Сказки Черномора" 2018. Все права защищены</p>
            </div>
            <ul class="footer-bottom-link">
                <li>
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::MAIN_PAGE, [], $currentShowcase->id) }}">Главная</a>
                </li>
                <li>
                    <a href="{{ static_page_route(\App\Classes\StaticPageTypesEnum::CONTACTS_PAGE, [], $currentShowcase->id) }}">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
