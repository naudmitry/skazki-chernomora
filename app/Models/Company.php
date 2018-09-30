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
 * @property string $slug
 * @property string $title
 * @property integer $admin_id
 * @property boolean $enable
 * @property-read Admin $admin
 * @property-read Collection|Admin[] $admins
 * @property-read Collection|Showcase[] $showcases
 */
class Company extends Model
{
    use SoftDeletes;

    protected $with =
        [
            'admin',
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
//
//    public function groups()
//    {
//        return $this->hasMany(Group::class);
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function showcases()
    {
        return $this->hasMany(Showcase::class);
    }
}
