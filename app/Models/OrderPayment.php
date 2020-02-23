<?php

namespace App\Models;

use App\Classes\PaymentType;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderPayment
 * @package App
 * @property integer $id
 * @property integer $company_id
 * @property integer $showcase_id
 * @property integer $order_id
 * @property float $amount
 * @property float $debt
 * @property string $type
 * @property integer $buyer_id
 */
class OrderPayment extends Model
{
    protected $appends = [
        'type_name'
    ];

    /**
     * @return string
     */
    public function getTypeNameAttribute()
    {
        return PaymentType::$labels[$this->type];
    }
}
