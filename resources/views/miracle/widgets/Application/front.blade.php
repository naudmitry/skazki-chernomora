<section id="content" data-widget="{{ $widget_class }}">
    <div class="container">
        <div class="col-md-8 center-block text-center block application-section">
            <div class="heading-box">
                <h2 class="box-title">{{ $setting->title }}</h2>
            </div>

            <form autocomplete="off" class="application-form" action="{{ route('site.application.save') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group dropdown">
                    <select name="country" class="selector full-width">
                        <option value="">Выберите страну</option>
                        <option value="Беларусь">Беларусь</option>
                        <option value="Россия">Россия</option>
                    </select>
                </div>

                <div class="form-group column-2 no-column-bottom-margin">
                    <input name="surname" type="text" class="input-text" placeholder="Фамилия">
                    <input name="name" type="text" class="input-text" placeholder="Имя">
                </div>

                <div class="form-group column-2 no-margin">
                    <input type="email" name="email" class="input-text" placeholder="Email">
                    <input type="text" name="phone" class="input-text" placeholder="Телефон">
                </div>

                <div class="form-group text-align-left">
                    <div class="checkbox">
                        <label><input value="1" type="checkbox" name="confirmation">{!! $setting->text !!}</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn style1">Отправить заявку</button>
                </div>
            </form>
        </div>
    </div>
</section>