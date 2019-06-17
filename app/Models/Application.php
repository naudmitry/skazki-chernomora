<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Application
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property boolean $is_process_personal_data
 *
 * @mixin \Eloquent
 */
class Application extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ApplicationType::class, 'application_type_id');
    }
}
