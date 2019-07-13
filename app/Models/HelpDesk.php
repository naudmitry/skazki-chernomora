<?php

namespace App\Models;

use App\Classes\HelpDeskStatusEnum;
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
 * @property string $phone
 */
class HelpDesk extends Model
{
    use ShowcasableTrait;
    use DateableTrait;

    protected $appends =
        [
            'formatCreatedAt',
            'formatUpdatedAt',
            'statusI18n'
        ];

    /**
     * @return mixed
     */
    public function getStatusI18nAttribute()
    {
        return HelpDeskStatusEnum::$labels[$this->status];
    }
}
