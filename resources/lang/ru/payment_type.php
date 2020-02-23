<?php

use App\Classes\PaymentType;

return [
    PaymentType::CARD => 'картой',
    PaymentType::CASH => 'наличные',
    PaymentType::INVOICE => 'счет',
    PaymentType::NOT_DEFINED => 'не определено',
];
