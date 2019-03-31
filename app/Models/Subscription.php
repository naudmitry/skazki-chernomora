<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscription
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property float $base_cost
 * @property array $settings
 *
 * @mixin \Eloquent
 */
class Subscription extends Model
{
    use SoftDeletes;

    protected $casts = [
        'settings' => 'array'
    ];
}
