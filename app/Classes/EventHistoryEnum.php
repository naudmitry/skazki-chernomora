<?php

namespace App\Classes;

class EventHistoryEnum extends Enum
{
    const CHANGE_ADMIN = 'CHANGE_ADMIN';

    public static $labels = [
        self::CHANGE_ADMIN => 'Смена администратора',
    ];
}