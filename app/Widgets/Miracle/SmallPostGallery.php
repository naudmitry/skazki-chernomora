<?php

namespace App\Widgets\Miracle;

use Validator;

class SmallPostGallery extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
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
                'items.*.image_link' => 'required|url',
                'items.*.image_link_small' => 'required|url',
                'items.*.title' => 'required|string',
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'items.*.image_link' => 'Введите ссылку на картинку.',
                'items.*.image_link_small' => 'Введите ссылку на картинку.',
                'items.*.title' => 'Введите заголовок картинки.',
            ]
        );
    }
}
