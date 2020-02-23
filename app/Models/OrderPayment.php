<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderPayment
 * @package App
 * @property integer $id
 * @property integer $company_id
 * @property integer $order_id
 * @property float $amount
 * @property float $debt
 * @property integer $buyer_id
 */
class OrderPayment extends Model
{
    //
}
