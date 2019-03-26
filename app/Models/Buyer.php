<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Buyer
 * @package App
 *
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $middle_name
 * @property string $email
 * @property string $number_contract
 * @property Carbon $contract_at
 * @property string $phone_number
 * @property boolean $is_temporary
 * @property boolean $is_enabled
 * @property integer $stat_orders
 * @property float $stat_orders_sum
 * @property string $rating
 * @property string $statuses
 * @property integer $showcase_id
 * @property Carbon $login_at
 * @property string $login_from
 * @property string $created_from
 * @property string $password
 *
 * @mixin \Eloquent
 */
class Buyer extends Model
{

}
