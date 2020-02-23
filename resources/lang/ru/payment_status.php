<?php

use App\Classes\PaymentStatus;

return [
    PaymentStatus::NOT_PAID => 'не оплачено',
    PaymentStatus::PAID => 'оплачено',
    PaymentStatus::PARTLY_PAID => 'частично оплачено',
];
