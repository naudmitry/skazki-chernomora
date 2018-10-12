<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

/**
 * Class Admin
 * @package App\Models
 *
 * @property integer $id
 * @property boolean $super
 * @property string $name
 * @property string $middle_name
 * @property string $surname
 * @property string $position
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property-read Company $company
 * @property-read Role $role
 * @property-read Collection|Company[] $companies
 * @property-read Collection|Showcase[] $showcases
 */
class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'admin_company');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function showcases()
    {
        return $this->belongsToMany(Showcase::class, 'admin_showcase', 'admin_id', 'showcase_id')->withTimestamps();
    }
}
