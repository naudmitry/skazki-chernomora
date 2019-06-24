<?php

use App\Classes\SettingsDataTypeEnum;

return
    [
        'fields-config' =>
            [
                \App\Models\Company::class =>
                    [
                        'accounting:country' => ['type' => SettingsDataTypeEnum::TYPE_INTEGER, 'default' => '1'],
                    ],

                \App\Models\Showcase::class =>
                    [
                        'general:display-site-name' => ['type' => SettingsDataTypeEnum::TYPE_STRING],
                        'general:geo-ip' => ['type' => SettingsDataTypeEnum::TYPE_ARRAY],
                        'general:is-use-geo-ip' => ['type' => SettingsDataTypeEnum::TYPE_BOOLEAN, 'default' => false],

                        'seo-integration:robots-text' => ['type' => SettingsDataTypeEnum::TYPE_STRING],
                    ]
            ]
    ];