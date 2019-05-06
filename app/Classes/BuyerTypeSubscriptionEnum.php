<?php

namespace App\Classes;

class BuyerTypeSubscriptionEnum extends Enum
{
    const FREE = 'free';
    const ISSUED_SUBSCRIPTION = 'issued_subscription';
    const RE_SUBSCRIPTION = 're_subscription';
    const CONSTANT = 'constant';

    public static $labels =
        [
            self::FREE => 'Бесплатный',
            self::ISSUED_SUBSCRIPTION => 'Оформил абонемент',
            self::RE_SUBSCRIPTION => 'Повторный абонемент',
            self::CONSTANT => 'Постоянный',
        ];
}