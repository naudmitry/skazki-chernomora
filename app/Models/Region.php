<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * @package App\Models
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 * @property string $code
 *
 * @property-read Country $country
 * @property-read City[] $cities
 *
 * @mixin \Eloquent
 */
class Region extends Model
{
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
