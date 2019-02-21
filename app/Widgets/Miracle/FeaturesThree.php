<?php

namespace App\Widgets\Miracle;

use Validator;

class FeaturesThree extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'items' =>
                [
                    [
                        'icon' => 'check',
                        'animation_delay' => 0
                    ],
                    [
                        'icon' => 'eye',
                        'animation_delay' => 0.5
                    ],
                    [
                        'icon' => 'tint',
                        'animation_delay' => 1
                    ]
                ],
        ];

    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'items.*.title' => 'required|string',
                'items.*.subtitle' => 'required|string',
                'items.*.button_title' => 'required|string'
            ],
            [],
            [
                'items.*.title' => 'Введите заголовок.',
                'items.*.subtitle' => 'Введите подзаголовок',
                'items.*.button_title' => 'Введите надпись на кнопке.'
            ]);
    }
}