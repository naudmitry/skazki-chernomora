<footer id="footer" class="style4">
    @foreach(array_get($widgets_bottom, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
    <div class="footer-wrapper">
        <div class="container">
            <div class="row add-clearfix same-height">
                @foreach(array_get($widgets_bottom, 'middle', []) as $widget)
                    @widget('miracle.' . $widget->class_name, ['widget' => $widget])
                @endforeach

                <div class="col-sm-6 col-md-3">
                    <h5 class="section-title box">About Miracle</h5>
                    <p>Mircale is a Hand Crafted Pexil Perfect - Responsive - Multi-Purpose & Retina Ready Premium Wordpress Theme which sets new standards for the web design in 2014.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fa fa-twitter has-circle" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-facebook has-circle" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-google-plus has-circle" data-toggle="tooltip" data-placement="top" title="GooglePlus"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-linkedin has-circle" data-toggle="tooltip" data-placement="top" title="LinkedIn"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-skype has-circle" data-toggle="tooltip" data-placement="top" title="Skype"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-dribbble has-circle" data-toggle="tooltip" data-placement="top" title="Dribbble"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-tumblr has-circle" data-toggle="tooltip" data-placement="top" title="Tumblr"></i></a>
                    </div>
                    <a href="#" class="btn btn-sm style4">Contact Us</a>
                    <a href="#" class="btn btn-sm style4">Purchase</a>
                    <a href="#" class="back-to-top"><span></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="copyright-area">
                <nav class="secondary-menu">
                    <ul class="nav nav-pills">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li><a href="#">Shortcodes</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shop</a></li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy; 2014 Miracle <em>by</em> <a href="http://www.soaptheme.net/">SoapTheme</a>
                </div>
            </div>
        </div>
    </div>
</footer>