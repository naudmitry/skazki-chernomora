<?php

namespace App\Models;

use App\Repositories\Date\DateableTrait;
use App\Traits\HistoriableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Buyer
 * @package App
 *
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $middle_name
 * @property string $gender
 * @property string $passport
 * @property Carbon $birthday_at
 * @property string $address
 * @property string $email
 * @property string $number_contract
 * @property Carbon $contract_at
 * @property string $phone_number
 * @property string $dynamics
 * @property boolean $is_temporary
 * @property boolean $is_enabled
 * @property integer $stat_orders
 * @property float $stat_orders_sum
 * @property string $rating
 * @property string $statuses
 * @property integer $showcase_id
 * @property integer $organization_id
 * @property Carbon $login_at
 * @property string $login_from
 * @property string $created_from
 * @property string $password
 * @property string $type_subscription
 * @property integer $admin_id
 * @property integer $privilege_id
 * @property Carbon $passport_issuing_at
 * @property string $passport_issued_by
 *
 * @property Admin $admin
 *
 * @mixin \Eloquent
 */
class Buyer extends Model
{
    use DateableTrait;
    use SoftDeletes;
    use HistoriableTrait;

    protected $with = [
        'adSources',
        'diagnoses',
        'complaints',
        'admin',
        'privilege',
        'organization'
    ];

    protected $dates = [
        'contract_at',
        'birthday_at',
        'passport_issuing_at'
    ];

    protected $appends = [
        'full_name',
        'formatCreatedAt',
        'formatUpdatedAt'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function adSources()
    {
        return $this->belongsToMany(AdSource::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diagnoses()
    {
        return $this->belongsToMany(Diagnosis::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function complaints()
    {
        return $this->belongsToMany(Complaint::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function privilege()
    {
        return $this->belongsTo(Privilege::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }
}
