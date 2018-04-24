<?php

namespace App\Widgets\Miracle;

use Validator;

class FullwidthTabs extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'items' => []
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
                'items.*.title' => 'required|string',
                'items.*.text' => 'required|string'
            ],
            [],
            [
                'items.*.title' => 'Выберите переход.',
                'items.*.text' => 'Введите скорость перехода.'
            ]
        );
    }
}
