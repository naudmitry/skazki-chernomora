<?php

namespace App\Widgets\Miracle;

use Validator;

class MultiBox extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
            'is_header_show' => '',
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
                'title' => 'required|string',
                'items.*.title' => 'required|max:25',
                'items.*.subtitle' => 'required|max:180',
                'items.*.icon' => 'required|string',
                'items.*.link' => 'required|string',
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'items.*.title' => 'Введите заголовок.',
                'items.*.subtitle' => 'Введите подзаголовок.',
                'items.*.icon' => 'Выберите иконку.',
                'items.*.link' => 'Введите ссылку.',
            ]);
    }
}