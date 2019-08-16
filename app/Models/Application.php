<?php

namespace App\Models;

use App\Repositories\Date\DateableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Application
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $phone
 * @property string $country
 * @property boolean $is_process_personal_data
 *
 * @mixin \Eloquent
 */
class Application extends Model
{
    use DateableTrait;

    protected $appends =
        [
            'formatCreatedAt',
            'formatUpdatedAt',
        ];
}
