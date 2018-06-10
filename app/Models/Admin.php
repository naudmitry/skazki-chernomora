<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

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
    //
}
