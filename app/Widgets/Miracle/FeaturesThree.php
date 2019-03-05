<?php

namespace App\Widgets\Miracle;

use Validator;

class FeaturesThree extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'items' => [
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
            ]
        ];

    /**
     * @param $validatedData
     * @return \Illuminate\Validation\Validator|null
     */
    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'items.*.title' => 'required|max:32',
                'items.*.subtitle' => 'required|max:180',
            ],
            [],
            [
                'items.*.title' => 'Введите заголовок.',
                'items.*.subtitle' => 'Введите подзаголовок',
            ]);
    }
}