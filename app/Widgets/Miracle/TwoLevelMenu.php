<?php

namespace App\Widgets\Miracle;

use Validator;

class TwoLevelMenu extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'items' => [],
            'title' => '',
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
                'title' => 'required|max:30',
                'items.*.title' => 'required|max:30',
            ],
            [],
            [
                'title' => 'Введите название.',
                'items.*.title' => 'Введите название.',
            ]);
    }
}
