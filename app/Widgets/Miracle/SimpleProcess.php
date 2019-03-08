<?php

namespace App\Widgets\Miracle;

use Validator;

class SimpleProcess extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
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
                'items.*.title' => 'required|string',
                'items.*.subtitle' => 'required|string',
                'items.*.icon' => 'required|string'
            ],
            [],
            [
                'items.*.title' => 'Введите заголовок.',
                'items.*.subtitle' => 'Введите подзаголовок.',
                'items.*.icon' => 'Выберите иконку.'
            ]);
    }
}