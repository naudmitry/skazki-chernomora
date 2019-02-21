<?php

namespace App\Widgets\Miracle;

use Validator;

class Banner extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => '',
            'image_link' => ''
        ];

    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|string',
                'subtitle' => 'required|string',
                'image_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'subtitle' => 'Введите подзаголовок.',
                'image_link' => 'Введите ссылку на картинку.'
            ]);
    }
}