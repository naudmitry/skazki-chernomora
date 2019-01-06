@include('main_theme.layouts.header')

@include('main_theme.vendor.navigation', [
    'page' => 'Команда',
])

<section class="team-section section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Great
                        <span>Team</span>
                    </h3>
                    <p>Leverage agile frameworks to provide a robust synopsis for high level overv-
                        <br>iews. Iterative approaches to corporate strategy...</p>
                </div>
                <!-- Nav tabs -->
                <div class="tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#doctor" data-toggle="tab">doctor</a>
                        </li>
                        <li role="presentation">
                            <a href="#event-planning" data-toggle="tab">event planning</a>
                        </li>
                        <li role="presentation">
                            <a href="#lab" data-toggle="tab">lab</a>
                        </li>
                        <li role="presentation">
                            <a href="#marketing" data-toggle="tab">marketing</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <!--Start single tab content-->
                    <div class="team-members tab-pane fade in active row" id="doctor">
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/doctor-1.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Emely Robert</h6>
                                <p>Bone Specialist</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/doctor-2.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Rag Jhon</h6>
                                <p>Eye Specialist</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/doctor-3.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Tent Richardson</h6>
                                <p>Skin Specialist</p>
                            </div>
                        </div>
                    </div>
                    <!--End single tab content-->
                    <!--Start single tab content-->
                    <div class="team-members tab-pane fade in row" id="event-planning">
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/event-1.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Sheiring Ton</h6>
                                <p>Manager</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/event-2.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Rig Richard</h6>
                                <p>Sr. Manager</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/event-3.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Tom Moddy</h6>
                                <p>President</p>
                            </div>
                        </div>
                    </div>
                    <!--End single tab content-->
                    <!--Start single tab content-->
                    <div class="team-members tab-pane fade in row" id="lab">
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/doctor-lab-1.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Maria Robert</h6>
                                <p>X-ray</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/doctor-lab-2.jpg" class="img-responsive" alt="team">
                                <h6>Dr. John Kelly</h6>
                                <p>ultrasound therapy</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/doctor-lab-3.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Simran Toe</h6>
                                <p>bone therapy</p>
                            </div>
                        </div>
                    </div>
                    <!--End single tab content-->
                    <!--Start single tab content-->
                    <div class="team-members tab-pane fade in row" id="marketing">
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/doctor-2.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Rag Jhon</h6>
                                <p>Eye Specialist</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/doctor-lab-2.jpg" class="img-responsive" alt="team">
                                <h6>Dr. John Kelly</h6>
                                <p>ultrasound therapy</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="team-person text-center">
                                <img src="images/team/event-1.jpg" class="img-responsive" alt="team">
                                <h6>Dr. Sheiring Ton</h6>
                                <p>Manager</p>
                            </div>
                        </div>
                    </div>
                    <!--End single tab content-->
                </div>
            </div>
        </div>
    </div>
</section>

@include('main_theme.vendor.footer')
