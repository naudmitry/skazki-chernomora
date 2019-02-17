@extends('miracle.layouts.master')

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    <div class="section container">
        <div class="row">
            <div class="col-sm-8 box">
                <form>
                    <div class="row">
                        <div class="form-group col-sms-6 col-sm-6">
                            <input type="text" class="input-text full-width" placeholder="First name">
                        </div>
                        <div class="form-group col-sms-6 col-sm-6">
                            <input type="text" class="input-text full-width" placeholder="Last name">
                        </div>
                        <div class="form-group col-sms-6 col-sm-6">
                            <input type="text" class="input-text full-width" placeholder="Email address">
                        </div>
                        <div class="form-group col-sms-6 col-sm-6">
                            <input type="text" class="input-text full-width" placeholder="Website">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea rows="10" class="input-text full-width" placeholder="Send Message"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md style1">Write Message</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <ul class="contact-address style1">
                    <li class="office-address">
                        <i class="fa fa-map-marker"></i>
                        <div class="details">
                            <h5>Office Address</h5>
                            <p>Hoffman Parkway, P.O Box 353 Mountain View. United States of America. </p>
                        </div>
                    </li>
                    <li class="phone">
                        <i class="fa fa-phone"></i>
                        <div class="details">
                            <h5>Phone</h5>
                            <p>
                                Local: 1-800-123-hello
                                <br>
                                Mobile: 1-800-123-hello
                            </p>
                        </div>
                    </li>
                    <li class="email-address">
                        <i class="fa fa-envelope"></i>
                        <div class="details">
                            <h5>Office Address</h5>
                            <p>
                                soaptheme@google.com
                                <br>
                                www.soaptheme.net/wordpress/miracle
                            </p>
                        </div>
                    </li>
                </ul>
                <div class="social-icons style1 size-md">
                    <a href="#" class="social-icon" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter has-circle"></i></a>
                    <a href="#" class="social-icon" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook has-circle"></i></a>
                    <a href="#" class="social-icon" data-toggle="tooltip" data-placement="top" title="GooglePlus"><i class="fa fa-google-plus has-circle"></i></a>
                    <a href="#" class="social-icon" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin has-circle"></i></a>
                    <a href="#" class="social-icon" data-toggle="tooltip" data-placement="top" title="Skype"><i class="fa fa-skype has-circle"></i></a>
                    <a href="#" class="social-icon" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="fa fa-dribbble has-circle"></i></a>
                    <a href="#" class="social-icon" data-toggle="tooltip" data-placement="top" title="Tumblr"><i class="fa fa-tumblr has-circle"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection