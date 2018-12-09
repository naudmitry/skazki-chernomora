<?php

use App\Classes\SettingsDataTypeEnum;

return
    [
        'fields-config' =>
            [
                \App\Models\Showcase::class =>
                    [
                        'general:geo-ip' => ['type' => SettingsDataTypeEnum::TYPE_ARRAY],
                        'general:is-use-geo-ip' => ['type' => SettingsDataTypeEnum::TYPE_BOOLEAN, 'default' => false],
                    ]
            ]
    ];