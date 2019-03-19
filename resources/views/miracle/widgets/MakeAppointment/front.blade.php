<section id="content">
    <div class="container">
        <div class="col-md-8 center-block text-center block make-appointment-section">
            <div class="heading-box">
                <h2 class="box-title">{{ $setting->title }}</h2>
            </div>

            <form autocomplete="off" class="order-form" action="{{ route('front.orders.save') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group column-2 no-column-bottom-margin">
                    <input type="text" name="name" class="input-text" placeholder="Имя" required>
                    <input type="email" name="email" class="input-text" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input required type="text" name="phone_number" class="input-text full-width" placeholder="Телефон">
                </div>

                <div class="form-group">
                    <input required type="date" name="desired_date" class="input-text full-width" placeholder="Дата">
                </div>

                <div class="form-group dropdown">
                    <select class="selector full-width" name="salt_cave" required>
                        <option value="">Выберите пещеру</option>
                        <option value="Коммунистическая, 16">Коммунистическая, 16</option>
                        <option value="Чкалова, 14в">Чкалова, 14в</option>
                        <option value="Фрунзе, 81, корп. 33">Фрунзе, 81, корп. 33</option>
                        <option value="Гончарная, 3">Гончарная, 3</option>
                    </select>
                </div>

                <div class="form-group dropdown">
                    <select class="selector full-width" name="type" required>
                        <option value="">Тип посещения</option>
                        <option value="Первое посещение">Первое посещение</option>
                        <option value="Повторное">Повторное</option>
                    </select>
                </div>

                <div class="form-group box">
                    <textarea name="message" class="input-text full-width" placeholder="Ваше сообщение" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn style1">Записаться</button>
                </div>
            </form>
        </div>
    </div>
</section>



<div style="display: flex; justify-content: center;">
    <div class="col-sm-6 box make-appointment-section">

    </div>
</div>