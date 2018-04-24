<?php

namespace App\Classes;

class BuyerStatusEnum extends Enum
{
    const VISITOR = 'visitor';
    const SHOPPER = 'shopper';
    const BUYER = 'buyer';
    const SUBSCRIBER = 'subscriber';
}
