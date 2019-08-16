<?php

namespace App\Classes;

class OrderStatus extends Enum
{
    const NEW = 'new';
    const IN_WORK = 'in_work';
    const ANNULLED = 'annulled';
    const CLOSE = 'close';

    public static $labels =
        [
            self::NEW => 'Новый',
            self::IN_WORK => 'В работе',
            self::ANNULLED => 'Аннулирован',
            self::CLOSE => 'Закрыт',
        ];
}