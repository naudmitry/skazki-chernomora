<?php

namespace App\Widgets\Miracle;

use Validator;

class PostSlider extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => '',
            'is_header_show' => '',
            'items' => [],
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
                'items.*.title' => 'required|string',
                'items.*.image_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок',
                'subtitle' => 'Введите подзаголовок',
                'items.*.title' => 'Введите заголовок слайда',
                'items.*.image_link' => 'Введите ссылку картинки для слайда.',
            ]
        );
    }
}
