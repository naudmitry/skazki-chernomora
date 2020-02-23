<?php

namespace App\Widgets\Miracle;

use Validator;

class CallOutBox2 extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'link' => '',
            'button' => ''
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
                'link' => 'required|string',
                'button' => 'required|string'
            ],
            [],
            [
                'title' => 'Введите название.',
                'link' => 'Введите ссылку.',
                'button' => 'Введите надпись для кнопки.'
            ]
        );
    }
}
