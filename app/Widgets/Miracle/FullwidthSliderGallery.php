<?php

namespace App\Widgets\Miracle;

use Validator;

class FullwidthSliderGallery extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
            'is_header_show' => '',
            'items' => []
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
                'items.*.title' => 'required|string',
                'items.*.image_link' => 'required|url',
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'items.*.title' => 'Введите наименование.',
                'items.*.image_link' => 'Введите ссылку.',
            ]
        );
    }
}
