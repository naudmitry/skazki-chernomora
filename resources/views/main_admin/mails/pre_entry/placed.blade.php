<div>
    <h1>Предварительная запись №{{ $preEntry->id }}</h1>

    <p>Дата записи: {{ $preEntry->created_at->format('d/m/Y H:i') }}</p>
    <p>ФИО клиента: {{ $preEntry->full_name }}</p>
    <p>Электронная почта: {{ $preEntry->email }}</p>
    <p>Телефон: {{ $preEntry->phone_number }}</p>
    <p>Желаемая дата посещения: {{ $preEntry->desired_at->format('d/m/Y') }}</p>
    <p>Соляная пещера: {{ $preEntry->saltCaveTitle }}</p>
    <p>Тип посещения: {{ $preEntry->typeI18n }}</p>
    <p>Сообщение: {{ $preEntry->message }}</p>

    <h5>Не отвечайте на данное письмо, так как оно сгенерировано автоматически.</h5>
</div>