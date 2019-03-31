<?php

namespace App\Classes;

class ReviewStatusEnum extends Enum
{
    const NEW = 'new';
    const APPROVED = 'approved';
    const NOT_APPROVED = 'not_approved';
}