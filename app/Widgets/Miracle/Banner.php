<?php

namespace App\Widgets\Miracle;

use App\Classes\StaticPageTypesEnum;
use App\Models;
use App\Repositories\PageRepository;
use Validator;

class Banner extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'title_color' => '#ff6600',
            'subtitle' => '',
            'subtitle_color' => '#343434',
            'image_link' => '',
            'is_breadcrumbs' => 1
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
                'title_color' => 'required|string',
                'subtitle' => 'required|string',
                'subtitle_color' => 'required|string',
                'image_link' => 'required|url',
                'is_breadcrumbs' => 'required|boolean'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'title_color' => 'Введите цвет заголовка.',
                'subtitle' => 'Введите подзаголовок.',
                'subtitle_color' => 'Введите цвет подзаголовка.',
                'image_link' => 'Введите ссылку на картинку.',
                'is_breadcrumbs' => 'Навигационная цепочка'
            ]);
    }

    /**
     * @return array
     */
    protected function getFrontViewData()
    {
        $showcase = $this->showcaseWidget->container->showcase;

        $mainPage = app(PageRepository::class)->getStaticPage($showcase, StaticPageTypesEnum::MAIN_PAGE);
        $entity = $this->showcaseWidget->container->widgetable;

        switch (true) {
            case $entity instanceof Models\Page :
                $currentPage = $entity->static_page_type
                    ? app(PageRepository::class)->getStaticPage($showcase, $entity->static_page_type)
                    : $entity;
                break;
            case $entity instanceof Models\Blog :
                $currentPage = $entity;
                break;
            default:
        }

        return array_merge(parent::getFrontViewData(),
            compact('mainPage', 'currentPage', 'showcase')
        );
    }
}