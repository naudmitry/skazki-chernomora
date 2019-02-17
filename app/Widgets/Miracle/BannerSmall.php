<?php

namespace App\Widgets\Miracle;

use Validator;

class BannerSmall extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'image_link' => ''
        ];

    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|string',
                'image_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'image_link' => 'Введите ссылку на картинку.'
            ]);
    }
}