<?php

namespace App\Widgets\Maintheme;

class Reviews extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'company' => '',
            'rating' => '4.9',
        ];

    /**
     * @return array
     */
    protected function getFrontViewData()
    {
//        $showcase = $this->showcaseWidget->container->showcase;
//
//        $reviews = Models\Review::query()
//            ->where('showcase_id', $showcase->id)
//            ->where('status', ReviewStatusEnum::APPROVED));
//
//        $reviews_all = (clone $reviews)->count();
//        $averageRating = (clone $reviews)->avg('rating');
//
//        $reviews = $reviews
//            ->where('show_in_widgets', true)
//            ->inRandomOrder()
//            ->take(4)
//            ->get();
//
//        /** @var \Illuminate\Support\Collection $reviews */
//        $reviews = $reviews->sortByDesc('created_at');
//
//        return array_merge(parent::getFrontViewData(),
//            compact('reviews', 'reviews_all', 'averageRating')
//        );
    }
}