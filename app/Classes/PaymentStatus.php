<?php

namespace App\Classes;

class PaymentStatus extends Enum
{
    const NOT_PAID = "not_paid";
    const PAID = "paid";
    const PARTLY_PAID = "partly_paid";
}