<?php

namespace App\Models;

use App\Repositories\SettingsRepository;
use App\Setting;
use Illuminate\Database\Eloquent\Collection;

/**
 * Trait SettingsAvailability
 * @package App\Models
 *
 * @property-read Collection|Setting $settings
 */
trait SettingsAvailability
{
    /**
     * @return mixed
     */
    public function settings()
    {
        return $this->morphMany(Setting::class, 'object');
    }

    /**
     * @param $name
     * @return mixed
     */
    public function config($name)
    {
        $repository = app(SettingsRepository::class);
        $repository->setObject($this);

        $value = $repository->getSetting($name);

        return $value;
    }
}
