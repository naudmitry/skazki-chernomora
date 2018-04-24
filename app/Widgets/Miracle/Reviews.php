<?php

namespace App\Widgets\Miracle;

use App\Models;
use Validator;

class Reviews extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'subtitle' => ''
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
                'subtitle' => 'required|string'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'subtitle' => 'Введите подзаголовок.'
            ]
        );
    }

    /**
     * @return array
     */
    protected function getFrontViewData()
    {
        $showcase = $this->showcaseWidget->container->showcase;

        $reviews = Models\Review::query()
            ->where('showcase_id', $showcase->id)
            ->where('is_widget', true)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return array_merge(
            parent::getFrontViewData(),
            compact('reviews')
        );
    }
}
