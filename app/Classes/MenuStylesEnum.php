<?php

namespace App\Classes;

class MenuStylesEnum extends Enum
{
    const COLORED = 'colored';
    const DARK = 'dark';
    const LIGHT = 'light';

    public static $labels =
        [
            self::COLORED => 'Цветное',
            self::DARK => 'Темное',
            self::LIGHT => 'Светлое',
        ];
}