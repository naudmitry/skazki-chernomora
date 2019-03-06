<?php

namespace App\Widgets\Miracle;

use Validator;

class SliderWithTitle extends AbstractContentWidget
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
                'items.*.title' => 'required|string',
                'items.*.subtitle' => 'required|string',
                'items.*.image_link' => 'required|url'
            ],
            [],
            [
                'items.*.title' => 'Введите заголовок слайда',
                'items.*.subtitle' => 'Введите подзаголовок слайда',
                'items.*.image_link' => 'Введите ссылку картинки для слайда.',
            ]);
    }
}