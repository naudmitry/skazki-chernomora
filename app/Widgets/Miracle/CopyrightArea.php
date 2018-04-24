<?php

namespace App\Widgets\Miracle;

use Validator;

class CopyrightArea extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'copyright' => '',
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
                'copyright' => 'required|string',
                'items.*.title' => 'required|string',
                'items.*.link' => 'required|url',
            ],
            [],
            [
                'copyright' => 'Введите название.',
                'items.*.title' => 'Введите название.',
                'items.*.link' => 'Введите ссылку.',
            ]
        );
    }
}
