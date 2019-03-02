<?php

namespace App\Widgets\Miracle;

use Validator;

class BannerSmall extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'title_color' => '#000',
            'image_link' => ''
        ];

    public function getSettingsValidator($validatedData)
    {
        return Validator::make(
            $validatedData,
            [
                'title' => 'required|string',
                'title_color' => 'required|string',
                'image_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'title_color' => 'Введите цвет заголовка.',
                'image_link' => 'Введите ссылку на картинку.'
            ]);
    }
}