<!-- Contact Section -->
<section class="appoinment-section section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="accordion-section">
                    <div class="section-title">
                        <h3>Вопросы и ответы</h3>
                    </div>
                    <div class="accordion-holder">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach ($faqs->random(5) as $faq)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading{{$faq->id}}">
                                        <h4 class="panel-title">
                                            <a
                                                    class="collapsed"
                                                    role="button"
                                                    data-toggle="collapse"
                                                    data-parent="#accordion"
                                                    href="#collapse{{$faq->id}}"
                                                    aria-expanded="false"
                                                    aria-controls="collapse{{$faq->id}}"
                                            >{{ $faq->name }}</a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}">
                                        <div class="panel-body">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="contact-area">
                    <div class="section-title">
                        <h3>Запись <span>на прием</span></h3>
                    </div>
                    <form name="contact_form" class="default-form contact-form" action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="Name" placeholder="Имя" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="Email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <select name="subject">
                                        <option>Коммунистическая, 16</option>
                                        <option>Чкалова, 14в</option>
                                        <option>Фрунзе, 81, корп. 33</option>
                                        <option>Гончарная, 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="Phone" placeholder="Телефон" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Date" placeholder="Дата" required="" id="datepicker">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                                <div class="form-group">
                                    <select name="subject">
                                        <option>Первое посещение</option>
                                        <option>Повторное</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea name="form_message" placeholder="Ваше сообщение" required=""></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-style-one">записаться</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>