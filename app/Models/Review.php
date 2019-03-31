<?php

namespace App;

use App\Repositories\Showcase\ShowcasableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Review
 * @package App
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $showcase_id
 * @property integer $buyer_id
 * @property string $ip
 * @property string $status
 * @property integer $rating
 * @property string $description
 * @property boolean $show_in_widgets
 * @property string $reply
 *
 * @mixin \Eloquent
 */
class Review extends Model
{
    use SoftDeletes;
    use ShowcasableTrait;
}
