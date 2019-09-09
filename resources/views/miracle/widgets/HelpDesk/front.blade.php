<section id="content" data-widget="{{ $widget_class }}">
    <div class="alert alert-success" hidden>
        <p>Спасибо, ваша заявка принята и в скором времени будет обработана нашим менеджером. При необходимости с вами свяжутся по телефону или электронной почте.</p>
        <span class="close"></span>
    </div>

    <div class="container">
        <div class="col-md-8 center-block text-center block">
            <div class="heading-box">
                <h2 class="box-title">{{ $setting->title }}</h2>
                <p class="desc-lg">{{ $setting->subtitle }}</p>
            </div>
            <form autocomplete="off" class="helpdesk-form" action="{{ route('front.helpdesk.save') }}" method="post">
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group col-sms-6 col-sm-6">
                        <input name="name" type="text" class="input-text full-width" placeholder="Имя">
                    </div>
                    <div class="form-group col-sms-6 col-sm-6">
                        <input name="surname" type="text" class="input-text full-width" placeholder="Фамилия">
                    </div>
                    <div class="form-group col-sms-6 col-sm-6">
                        <input name="email" type="text" class="input-text full-width" placeholder="Email">
                    </div>
                    <div class="form-group col-sms-6 col-sm-6">
                        <input name="phone" type="text" class="input-text full-width" placeholder="Номер телефона">
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" rows="10" class="input-text full-width" placeholder="Текст сообщения"></textarea>
                </div>
                <div class="form-group text-align-left">
                    <input hidden type="text" name="confirmation" value="false">
                    <div class="checkbox">
                        <label><input type="checkbox" name="confirmation" value="true">{!! $setting->text !!}</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md style1">Отправить сообщение</button>
                </div>
            </form>
        </div>
    </div>
</section>