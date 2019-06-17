<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Application
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property boolean $is_enabled
 *
 * @mixin \Eloquent
 */
class ApplicationType extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
