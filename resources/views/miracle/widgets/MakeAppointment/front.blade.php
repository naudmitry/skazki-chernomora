<section id="content" data-widget="{{ $widget_class }}">
    <div class="alert alert-success" hidden>
        <p>Спасибо, ваша заявка принята и в скором времени будет обработана нашим менеджером. С вами свяжутся по телефону или электронной почте.</p>
        <span class="close"></span>
    </div>

    <div class="container">
        <div class="col-md-8 center-block text-center block make-appointment-section">
            <div class="heading-box">
                <h2 class="box-title">{{ $setting->title }}</h2>
            </div>

            <form autocomplete="off" class="pre-entry-form" action="{{ route('front.pre-entry.save') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group column-2 no-column-bottom-margin">
                    <input type="text" name="full_name" class="input-text" placeholder="ФИО">
                    <input type="email" name="email" class="input-text" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="text" name="phone_number" class="input-text full-width" placeholder="Телефон">
                </div>

                <div class="form-group">
                    <input type="date" name="desired_at" class="input-text full-width" placeholder="Дата">
                </div>

                <div class="form-group dropdown">
                    <select class="selector full-width" name="salt_cave_id">
                        <option value="">Выберите пещеру</option>
                        @foreach ($saltCaves as $saltCave)
                            <option value="{{ $saltCave->id }}">{{ $saltCave->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group dropdown">
                    <select class="selector full-width" name="type">
                        <option value="">Тип посещения</option>
                        @foreach (\App\Classes\TypeVisitEnum::lists() as $typeVisit)
                            <option value="{{ $typeVisit }}">{{ \App\Classes\TypeVisitEnum::$labels[$typeVisit] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group box">
                    <textarea name="message" class="input-text full-width" placeholder="Ваше сообщение" rows="10"></textarea>
                </div>

                <div class="form-group text-align-left">
                    <div class="checkbox">
                        <label><input type="checkbox" name="confirmation">{!! $setting->text !!}</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn style1">Записаться</button>
                </div>
            </form>
        </div>
    </div>
</section>