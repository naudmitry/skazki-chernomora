<?php

namespace App\Widgets\Miracle;

use App\Classes\StaticPageTypesEnum;
use App\Models;
use App\Repositories\PageRepository;
use Validator;

class BannerSmall extends AbstractContentWidget
{
    protected $defaultSettings =
        [
            'title' => '',
            'title_color' => '#000',
            'image_link' => ''
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
                'image_link' => 'required|url'
            ],
            [],
            [
                'title' => 'Введите заголовок.',
                'title_color' => 'Введите цвет заголовка.',
                'image_link' => 'Введите ссылку на картинку.'
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
                $currentPage = app(PageRepository::class)->getStaticPage($showcase, $entity->static_page_type);
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