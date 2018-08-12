<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Admin
 * @package App\Models
 *
 * @property integer $id
 * @property boolean $super
 * @property string $name
 * @property string $firstname
 * @property string $surname
 * @property string $position
 * @property string $phone
 * @property string $email
 * @property string $password
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
}
