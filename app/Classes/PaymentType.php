<?php

namespace App\Classes;

class PaymentType extends Enum
{
    const CARD = "card";
    const CASH = "cash";
    const INVOICE = "invoice";
    const NOT_DEFINED = "not_defined";

    public static $labels =
        [
            self::CARD => 'Карта',
            self::CASH => 'Наличные',
            self::INVOICE => 'Счет',
            self::NOT_DEFINED => 'Не определено',
        ];
}
