<?php

namespace App\Widgets\Miracle;

use App\Models;
use Validator;

class Blog extends AbstractContentWidget
{
    /**
     * @var array
     */
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
            ]);
    }

    /**
     * @return array
     */
    protected function getFrontViewData()
    {
        $showcase = $this->showcaseWidget->container->showcase;

        $blogs = Models\Blog::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        /** @var \Illuminate\Support\Collection $reviews */
        $blogs = $blogs->sortByDesc('created_at');

        return array_merge(parent::getFrontViewData(),
            compact('blogs')
        );
    }
}