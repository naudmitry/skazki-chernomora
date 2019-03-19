<?php

namespace App\Widgets\Miracle;

use Validator;

class Highlights extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'content' => '',
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
                'content' => 'required|string',
            ],
            [],
            [
                'content' => 'Введите текст.',
            ]);
    }
}