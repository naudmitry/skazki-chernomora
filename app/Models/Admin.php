<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

/**
 * Class Admin
 * @package App\Models
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $role_id
 * @property boolean $super
 * @property string $name
 * @property string $middle_name
 * @property string $surname
 * @property string $position
 * @property string $phone
 * @property string $email
 * @property string $token
 * @property string $password
 * @property Carbon $registered_at
 * @property Carbon $login_at
 * @property string $registered_from
 * @property string $login_from
 * @property string $remember_token
 * @property Carbon $created_from
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property-read Company $company
 * @property-read Role $role
 * @property-read Collection|Company[] $companies
 * @property-read Collection|Showcase[] $showcases
 * @property-read Collection|Group[] $groups
 * @property-read bool $isCompanyAdmin
 *
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];

    protected $with = [
        'groups'
    ];

    protected $appends = [
        'isCompanyAdmin',
        'showcasesIds',
        'groupsIds',
        'companiesIds',
        'full_name'
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
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'admins_groups');
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

    /**
     * @param Company $company
     * @return bool
     */
    public function hasAccessToCompany(Company $company)
    {
        return (($this->company_id == $company->id) ||
            ($this->super && $this->companies()->getQuery()->where('companies.id', $company->id)->exists()));
    }

    /**
     * @param Showcase $showcase
     * @return bool
     */
    public function hasAccessToShowcase(Showcase $showcase)
    {
        return ($this->super || $this->showcases()->getQuery()->where('showcases.id', $showcase->id)->exists());
    }

    /**
     * @param $verifiableComponents
     * @param Company $administeredCompany
     * @return bool
     */
    public function hasAccessTo($verifiableComponents, Company $administeredCompany)
    {
        if (!is_array($verifiableComponents)) {
            $verifiableComponents = [$verifiableComponents];
        }

        $allowedComponents = ($this->company->is($administeredCompany)) ?
            ($this->company->enable ? $this->role->components : []) :
            ($this->super ? $administeredCompany->roles->where('enable', true)->first()->components : []);

        foreach ($verifiableComponents as $verifiableComponent) {
            if (in_array($verifiableComponent, $allowedComponents)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function getIsCompanyAdminAttribute()
    {
        return Company::query()
            ->where('id', $this->company_id)
            ->where('admin_id', $this->id)
            ->exists();
    }

    /**
     * @return Collection|int[]
     */
    public function getShowcasesIdsAttribute()
    {
        return $this->showcases()->pluck('showcase_id');
    }

    /**
     * @return Collection|int[]
     */
    public function getGroupsIdsAttribute()
    {
        return $this->groups()->pluck('group_id');
    }

    /**
     * @return Collection|int[]
     */
    public function getCompaniesIdsAttribute()
    {
        return $this->companies()->pluck('company_id');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }
}
