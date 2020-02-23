<?php

namespace App\Widgets\Miracle;

use App\Models;
use Validator;

class RecentPosts extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
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
            ],
            [],
            [
                'title' => 'Введите заголовок.',
            ]
        );
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
            ->take(3)
            ->get();

        /** @var \Illuminate\Support\Collection $reviews */
        $blogs = $blogs->sortByDesc('created_at');

        return array_merge(
            parent::getFrontViewData(),
            compact('blogs')
        );
    }
}
