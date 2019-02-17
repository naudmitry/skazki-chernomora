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

    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'items.*.transition' => 'required|string',
                'items.*.slot_amount' => 'required|integer',
                'items.*.speed' => 'required|integer',
                'items.*.image_link' => 'required|url'
            ],
            [],
            [
                'items.*.transition' => 'Выберите переход.',
                'items.*.slot_amount' => 'Введите количество слотов.',
                'items.*.speed' => 'Введите скорость перехода.',
                'items.*.image_link' => 'Введите ссылку картинки для слайдера.',
            ]);
    }
}