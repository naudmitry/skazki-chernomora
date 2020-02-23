<?php

namespace App\Widgets\Miracle;

use Validator;

class AnimatedInfographicPies extends AbstractContentWidget
{
    protected $blockable = true;

    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => '',
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
                'items.*.subtitle' => 'required|string',
                'items.*.percent' => 'required|integer',
            ],
            [],
            [
                'title' => 'Введите название',
                'subtitle' => 'Введите заголовок',
                'items.*.title' => 'Введите название.',
                'items.*.subtitle' => 'Введите подзаголовок.',
                'items.*.percent' => 'Введите процент.',
            ]
        );
    }
}
