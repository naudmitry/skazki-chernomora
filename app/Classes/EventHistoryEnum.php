<?php

namespace App\Classes;

class EventHistoryEnum extends Enum
{
    const CHANGE_ADMIN = 'CHANGE_ADMIN';
    const BUYER_VISIT = 'BUYER_VISIT';

    public static $labels = [
        self::CHANGE_ADMIN => 'Смена администратора',
        self::BUYER_VISIT => 'Посещение клиентом',
    ];
}
