<?php

namespace App\Widgets\Miracle;

use Validator;

class MetroGallery2 extends AbstractContentWidget
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
                'items.*.title' => 'required|string',
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'items.*.image_link' => 'Введите ссылку на картинку.',
                'items.*.title' => 'Введите наименование.',
            ]);
    }
}