<?php

namespace App\Widgets\Miracle;

use Validator;

class MetroGallery1 extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
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
                'items.*.image_link' => 'required|url',
            ],
            [],
            [
                'items.*.image_link' => 'Введите адрес картинки.',
            ]);
    }
}