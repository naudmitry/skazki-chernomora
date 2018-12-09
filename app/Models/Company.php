<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * @package App\Models
 *
 * @property integer $id
 * @property boolean $super
 * @property string $slug
 * @property string $title
 * @property integer $admin_id
 * @property boolean $enable
 * @property integer $stat_admins_count
 * @property-read Admin $admin
 * @property-read Collection|Admin[] $admins
 * @property-read Collection|Showcase[] $showcases
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @mixin \Eloquent
 */
class Company extends Model
{
    use SoftDeletes;
    use SettingsAvailability;

    protected $with =
        [
            'admin',
        ];

    protected $appends =
        [
            'formatCreatedAt',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function showcases()
    {
        return $this->hasMany(Showcase::class);
    }

    /**
     * @return mixed
     */
    public function getFormatCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
