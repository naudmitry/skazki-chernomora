<?php

namespace App\Widgets\Miracle;

use Validator;

class Quote extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'content' => '',
            'signature' => '',
            'style' => ''
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
                'content' => 'required|string',
                'style' => 'required|string',
                'signature' => 'string'
            ],
            [],
            [
                'content' => 'Введите текст.',
                'style' => 'Выберите стиль.',
            ]
        );
    }
}
