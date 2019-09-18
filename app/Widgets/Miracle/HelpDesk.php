<?php

namespace App\Widgets\Miracle;

use Validator;

class HelpDesk extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => '',
            'text' => '',
            'padding' => ''
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
                'subtitle' => 'required|string',
                'text' => 'required|string',
                'padding' => 'string',
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'subtitle' => 'Введите подзаголовок.',
                'text' => 'Введите текст подтверждения.',
            ]);
    }
}