<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Child
 * @package App\Models
 *
 * @property integer $id
 * @property integer $buyer_id
 * @property string $full_name
 * @property Carbon $birthday
 */
class Child extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function buyer()
    {
        return $this->hasOne(Buyer::class);
    }
}
