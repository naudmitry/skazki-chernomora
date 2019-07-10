<?php

namespace App\Models;

use App\Repositories\Date\DateableTrait;
use App\Repositories\Showcase\ShowcasableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HelpDesk
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $message
 * @property string $status
 */
class HelpDesk extends Model
{
    use ShowcasableTrait;
    use DateableTrait;

    protected $appends =
        [
            'formatCreatedAt',
            'formatUpdatedAt'
        ];

    protected $table = 'helpdesk';
}
