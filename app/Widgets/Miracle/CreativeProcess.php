<?php

namespace App\Widgets\Miracle;

use Validator;

class CreativeProcess extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
            'image_link' => '',
            'is_header_show' => '',
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
                'items.*.title' => 'required|string',
                'items.*.image_link' => 'required|string'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'items.*.title' => 'Введите заголовок.',
                'items.*.image_link' => 'Выберите иконку.'
            ]
        );
    }
}
