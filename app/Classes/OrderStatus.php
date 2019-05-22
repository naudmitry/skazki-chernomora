<?php

namespace App\Classes;

class OrderStatus extends Enum
{
    const NEW = 'new';
    const IN_WORK = 'in_work';
    const ANNULLED = 'annulled';
    const CLOSE = 'close';
}