<?php

namespace App\Classes;

class PaymentType extends Enum
{
    const CARD = "card";
    const CASH = "cash";
    const INVOICE = "invoice";
    const NOT_DEFINED = "not_defined";
}