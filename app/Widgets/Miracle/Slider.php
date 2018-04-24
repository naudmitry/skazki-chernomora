<?php

namespace App\Widgets\Miracle;

use Validator;

class Slider extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'items' => [],
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
                'items.*.transition' => 'required|string',
                'items.*.speed' => 'required|integer',
                'items.*.image_link' => 'required|url',
            ],
            [],
            [
                'items.*.transition' => 'Выберите переход.',
                'items.*.speed' => 'Введите скорость перехода.',
                'items.*.image_link' => 'Введите ссылку картинки для слайдера.',
            ]
        );
    }
}
