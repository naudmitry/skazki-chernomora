<?php

namespace App\Widgets\Miracle;

use Validator;

class Highlights extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'text' => '',
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
                'text' => 'required|string',
            ],
            [],
            [
                'text' => 'Введите текст.',
            ]);
    }
}