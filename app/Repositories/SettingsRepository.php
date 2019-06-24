<?php

namespace App\Repositories;

use App\Classes\SettingsDataTypeEnum;
use App\Setting;
use Illuminate\Database\Eloquent\Model;

class SettingsRepository
{
    protected $object;

    private $typesConfig = null;

    /**
     * SettingsRepository constructor.
     */
    public function __construct()
    {
        $this->typesConfig =
            [
                SettingsDataTypeEnum::TYPE_STRING => [],

                SettingsDataTypeEnum::TYPE_FLOAT =>
                    [
                        'get' => function ($str) {
                            return (float)$str;
                        },
                    ],

                SettingsDataTypeEnum::TYPE_INTEGER =>
                    [
                        'get' => function ($str) {
                            return (integer)$str;
                        },
                    ],

                SettingsDataTypeEnum::TYPE_BOOLEAN =>
                    [
                        'get' => function ($str) {
                            return !!$str;
                        },
                        'set' => function ($val) {
                            return $val ? 1 : 0;
                        },
                    ],

                SettingsDataTypeEnum::TYPE_ARRAY =>
                    [
                        'get' => function ($str) {
                            return (array)json_decode($str, true);
                        },
                        'set' => function ($val) {
                            return json_encode($val);
                        }
                    ],

                SettingsDataTypeEnum::TYPE_ARRAY_L10N =>
                    [
                        'get' => function ($str, $lang_id = null) {
                            $conf = (array)json_decode($str, true);
                            return is_null($lang_id) ? $conf : array_get($conf, $lang_id);
                        },
                        'set' => function ($val) {
                            return json_encode($val);
                        }
                    ],
            ];
    }

    /**
     * @param Model $object
     * @return $this
     */
    public function setObject(Model $object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * @param $name
     * @return \Illuminate\Config\Repository|mixed
     * @throws \Exception
     */
    private function getFieldConfig($name)
    {
        $config = config('settings.fields-config.' . get_class($this->object) . '.' . $name, false);

        if ($config === false) {
            throw new \Exception(sprintf('Field "%s" has no config.', $name));
        }

        return $config;
    }

    /**
     * @param $type
     * @return mixed
     * @throws \Exception
     */
    private function getTypeConfig($type)
    {
        $typeConfig = array_get($this->typesConfig, $type, false);

        if ($typeConfig === false) {
            throw new \Exception(sprintf('Settings type "%s" has no config.', $type));
        }

        return $typeConfig;
    }

    /**
     * @param $name
     * @param null $lang_id
     * @return \Illuminate\Config\Repository|mixed|string
     * @throws \Exception
     */
    public function getSetting($name, $lang_id = null)
    {
        $fieldConfig = $this->getFieldConfig($name);

        $typeConfig = $this->getTypeConfig($fieldConfig['type']);

        $setting = $this->object->settings()
            ->where('name', $name)
            ->first();

        $valueRaw = (!$setting && array_has(config('settings.fields-config.' . get_class($this->object) . '.' . $name), 'default')) ?
            config('settings.fields-config.' . get_class($this->object) . '.' . $name . '.default') :
            ($setting ? $setting->value : '');

        return isset($typeConfig['get']) ? $typeConfig['get']($valueRaw, $lang_id) : $valueRaw;
    }

    /**
     * @param $name
     * @param $value
     * @throws \Exception
     */
    public function save($name, $value)
    {
        $fieldConfig = $this->getFieldConfig($name);

        $typeConfig = $this->getTypeConfig($fieldConfig['type']);

        if ($fieldConfig['type'] == SettingsDataTypeEnum::TYPE_ARRAY_L10N) {
            $oldValue = $this->getSetting($name);
            $value = $oldValue;
        }

        $processedValue = isset($typeConfig['set']) ? $typeConfig['set']($value) : $value;

        $this->addOrUpdate($name, $processedValue);
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public function saveMany($data)
    {
        foreach ($data as $itemKey => $itemValue) {
            $this->save($itemKey, $itemValue);
        }
    }

    /**
     * @param $key
     * @param $value
     * @return Setting
     */
    public function addOrUpdate($key, $value)
    {
        /** @var Setting $setting */
        $setting = $this->object->settings()
            ->where('name', $key)
            ->first();

        if (!$setting) {
            $setting = new Setting;
            $setting->object()->associate($this->object);
            $setting->name = $key;
        }

        $setting->value = $value;
        $setting->save();

        return $setting;
    }
}