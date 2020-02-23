<?php

namespace App\Widgets\Miracle;

use Validator;

class Video extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => '',
            'poster_link' => '',
            'video_link' => ''
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
                'subtitle' => 'required|string',
                'poster_link' => 'required|url',
                'video_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок',
                'subtitle' => 'Введите подзаголовок',
                'poster_link' => 'Введите ссылку на постер.',
                'video_link' => 'Введите ссылку на видео.'
            ]
        );
    }
}
