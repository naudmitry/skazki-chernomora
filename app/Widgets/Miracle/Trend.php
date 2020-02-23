<?php

namespace App\Widgets\Miracle;

use Validator;

class Trend extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
            'sub_title' => '',
            'image_link' => '',
            'items' => [],
        ];

    /**
     * @param $validatedData
     * @return \Illuminate\Validation\Validator
     */
    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'image' => 'string',
                'items.*.percent' => 'required|integer',
                'items.*.title' => 'required|string',
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'sub_title' => 'Введите подзаголовок.',
                'items.*.percent' => 'Введите процент.',
                'items.*.title' => 'Введите название позиции.',
            ]
        );
    }
}
