<?php

namespace App\Widgets\Miracle;

use Validator;

class YandexMap extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'map_link' => '',
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
                'map_link' => 'required|string'
            ],
            [],
            [
                'map_link' => 'Введите ссылку карты.'
            ]);
    }
}