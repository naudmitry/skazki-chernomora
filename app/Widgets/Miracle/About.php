<?php

namespace App\Widgets\Miracle;

use Validator;

class About extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => '',
            'button_title' => '',
            'button_link' => '',
            'items' => []
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
                'subtitle' => 'required|string',
                'button_title' => 'required|string',
                'button_link' => 'required|string',
                'items.*.title' => 'required|string',
                'items.*.link' => 'required|url',
                'items.*.icon' => 'required|string',
            ],
            [],
            [
                'title' => 'Введите название.',
                'subtitle' => 'Введите подзаголовок.',
                'button_title' => 'Введите название кнопки.',
                'button_link' => 'Введите адрес кнопки.',
                'items.*.title' => 'Введите название.',
                'items.*.link' => 'Введите ссылку.',
                'items.*.icon' => 'Выберите иконку.',
            ]);
    }
}