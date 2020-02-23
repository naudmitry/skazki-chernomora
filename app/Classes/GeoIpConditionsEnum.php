<?php

namespace App\Classes;

class GeoIpConditionsEnum extends Enum
{
    const INCLUDE = 'include';
    const EXCLUDE = 'exclude';

    public static $labels =
        [
            self::INCLUDE => 'Включает',
            self::EXCLUDE => 'Исключает',
        ];
}
