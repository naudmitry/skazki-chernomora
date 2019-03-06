<?php

namespace App\Widgets\Miracle;

use Validator;

class OneLevelMenu extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'link' => ''
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
                'link' => 'required|string'
            ],
            [],
            [
                'title' => 'Введите название.',
                'link' => 'Введите ссылку.'
            ]);
    }
}