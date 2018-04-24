<?php

namespace App\Widgets\Miracle;

use Validator;

class Parallax extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => '',
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
                'subtitle' => 'required|string',
                'image_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'subtitle' => 'Введите подзаголовок.',
                'image_link' => 'Введите url картинки.'
            ]
        );
    }
}
