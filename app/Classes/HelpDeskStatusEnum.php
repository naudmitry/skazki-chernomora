<?php

namespace App\Classes;

class HelpDeskStatusEnum extends Enum
{
    const NEW = 'NEW';
    const COMPLETED = 'COMPLETED';

    public static $labels =
        [
            self::NEW => 'Новый',
            self::COMPLETED => 'Завершен',
        ];
}