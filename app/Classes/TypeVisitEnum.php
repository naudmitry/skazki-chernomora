<?php

namespace App\Classes;

class TypeVisitEnum extends Enum
{
    const FIRST = 'first';
    const REPEATED = 'repeated';

    public static $labels =
        [
            self::FIRST => 'Первое',
            self::REPEATED => 'Повторное',
        ];
}
