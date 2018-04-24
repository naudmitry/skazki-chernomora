<?php

namespace App\Widgets\Miracle;

use Validator;

class UsefulLinks extends AbstractContentWidget
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
                'items.*.link' => 'required|url',
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'items.*.title' => 'Введите заголовок.',
                'items.*.link' => 'Введите ссылку.',
            ]
        );
    }
}
