<?php

namespace App\Classes;

class ReviewStatusEnum extends Enum
{
    const NEW = 'new';
    const APPROVED = 'approved';
    const NOT_APPROVED = 'not_approved';

    public static $labels =
        [
            self::NEW => 'Новый',
            self::APPROVED => 'Одобрен',
            self::NOT_APPROVED => 'Не одобрен',
        ];
}
