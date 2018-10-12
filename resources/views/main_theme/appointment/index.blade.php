@include('main_theme.layouts.header')

@include('main_theme.vendor.pageHeader', [
    'page' => 'Запись на прием',
])

<!-- Contact Section -->
<section class="blog-section section style-three pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="contact-area style-two">
                    <div class="section-title">
                        <h3>Request <span>Appointment</span></h3>
                    </div>
                    <form name="contact_form" class="default-form contact-form" action="sendmail.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="Name" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="Email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <select name="subject">
                                        <option>Departments</option>
                                        <option>Diagnostic</option>
                                        <option>Psychological</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="Phone" placeholder="Phone" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Date" placeholder="Date" required="" id="datepicker">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                                <div class="form-group">
                                    <select name="subject">
                                        <option>Doctor</option>
                                        <option>Diagnostic</option>
                                        <option>Psychological</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea name="form_message" placeholder="Your Message" required=""></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-style-one">submit now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="appointment-image-holder">
                    <figure>
                        <img src="images/background/appoinment.jpg" alt="Appointment">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->

<!--team section-->
<section class="team-section section">
    <div class="container">
        <div class="section-title text-center">
            <h3>Our Expert
                <span>Doctors</span>
            </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem illo, rerum
                <br>natus nobis deleniti doloremque minima odit voluptatibus ipsam animi?</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-member">
                    <img src="images/team/doctor-2.jpg" alt="doctor" class="img-responsive">
                    <div class="contents text-center">
                        <h4>Dr. Robert Barrethion</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, aspernatur.</p>
                        <a href="#" class="btn btn-main">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-member">
                    <img src="images/team/doctor-lab-3.jpg" alt="doctor" class="img-responsive">
                    <div class="contents text-center">
                        <h4>Dr. Marry Lou</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, aspernatur.</p>
                        <a href="#" class="btn btn-main">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-member">
                    <img src="images/team/event-2.jpg" alt="doctor" class="img-responsive">
                    <div class="contents text-center">
                        <h4>Dr. Sansa Stark</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, aspernatur.</p>
                        <a href="#" class="btn btn-main">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End team section-->

@include('main_theme.vendor.footer')
