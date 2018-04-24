<?php

namespace App\Widgets\Miracle;

use Validator;

class Application extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'text' => ''
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
                'text' => 'required|string',
            ],
            [],
            [
                'title' => 'Введите текст.',
                'text' => 'Введите текст подтверждения.',
            ]
        );
    }
}
