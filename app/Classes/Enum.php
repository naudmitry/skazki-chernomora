<?php

namespace App\Classes;

class Enum
{
    /**
     * @return array
     */
    public static function lists()
    {
        return (new \ReflectionClass(get_called_class()))->getConstants();
    }
}
