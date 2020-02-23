<?php

namespace App\Widgets\Miracle;

use Validator;

class PostWrapper extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
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
                'items.*.title' => 'required|string',
                'items.*.image_link' => 'required|url',
                'items.*.category' => 'required|string'
            ],
            [],
            [
                'title' => 'Введите название',
                'items.*.title' => 'Введите название картинки.',
                'items.*.image_link' => 'Введите ссылку на картинку.',
                'items.*.category' => 'Введите категорию.',
            ]
        );
    }
}
