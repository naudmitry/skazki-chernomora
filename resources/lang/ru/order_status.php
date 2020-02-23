<?php

use App\Classes\OrderStatus;

return [
    OrderStatus::NEW => 'Новый',
    OrderStatus::IN_WORK => 'В работе',
    OrderStatus::ANNULLED => 'Аннулирован',
    OrderStatus::CLOSE => 'Закрыт',
];
