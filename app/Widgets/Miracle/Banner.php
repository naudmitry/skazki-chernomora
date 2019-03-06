<?php

namespace App\Widgets\Miracle;

use Validator;

class Banner extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'title_color' => '#ff6600',
            'subtitle' => '',
            'subtitle_color' => '#343434',
            'image_link' => ''
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
                'title_color' => 'required|string',
                'subtitle' => 'required|string',
                'subtitle_color' => 'required|string',
                'image_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'title_color' => 'Введите цвет заголовка.',
                'subtitle' => 'Введите подзаголовок.',
                'subtitle_color' => 'Введите цвет подзаголовка.',
                'image_link' => 'Введите ссылку на картинку.'
            ]);
    }
}