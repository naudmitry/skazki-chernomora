<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Showcase
 * @package App\Models
 *
 * @property integer $id
 * @property string $slug
 * @property integer $company_id
 * @property string $name
 * @property string $domain
 * @property string $email
 * @property string $setting
 * @property bool $enable
 *
 */
class Showcase extends Model
{
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_showcase', 'showcase_id', 'admin_id')->withTimestamps();
    }

    /**
     * @return string
     */
    public function getHttpOriginAttribute()
    {
        return 'http://' . $this->domain;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function domains()
    {
        return $this->hasMany(ShowcaseDomain::class, 'showcase_id');
    }
}
