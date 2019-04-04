<?php

namespace App\Repositories;

use App\Classes\PageTypesEnum;
use App\Models\Admin;
use App\Models\Page;
use App\Models\PageCategory;
use App\Models\Showcase;
use Illuminate\Support\Facades\Auth;

class PageRepository
{
    /**
     * @param Page|null $page
     * @param $data
     * @return Page
     */
    public function savePage(Page $page = null, $data)
    {
        /** @var Admin $admin */
        $admin = \Auth::guard('admin')->user();

        if (!isset($page)) {
            $page = new Page();
            $page->author_id = $admin->id;
            $page->company_id = array_get($data, 'company_id');
            $page->showcase_id = array_get($data, 'showcase_id');
        }

        $fields =
            [
                'category_id',
                'title',
                'name',
                'content',
                'breadcrumbs',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'link'
            ];

        foreach ($fields as $fieldItem) {
            if (array_has($data, $fieldItem)) {
                $page->$fieldItem = array_get($data, $fieldItem);
            }
        }

        $page->updater_id = $admin->id;
        $page->save();

        return $page;
    }

    /**
     * @param PageCategory|null $category
     * @param $data
     * @return PageCategory
     */
    public function saveCategory(PageCategory $category = null, $data)
    {
        if (!isset($category)) {
            $category = new PageCategory();
            $category->company_id = array_get($data, 'company_id');
            $category->showcase_id = array_get($data, 'showcase_id');
        }

        $fields =
            [
                'title',
                'name',
                'breadcrumbs',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'image_link'
            ];

        foreach ($fields as $fieldItem) {
            if (array_has($data, $fieldItem)) {
                $category->$fieldItem = array_get($data, $fieldItem);
            }
        }

        $category->save();

        return $category;
    }

    /**
     * @param Showcase $showcase
     * @param $pageType
     * @return Page|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getStaticPage(Showcase $showcase, $pageType)
    {
        $page = Page::query()
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->where('static_page_type', $pageType)
            ->where('showcase_id', $showcase->id)
            ->first();

        if (!isset($page)) {
            /** @var Admin $admin */
            $admin = \Auth::guard('admin')->user();

            $page = new Page();
            $page->static_page_type = $pageType;
            $page->type = PageTypesEnum::STATIC_PAGE;
            $page->author_id = $admin->id;
            $page->updater_id = $admin->id;
            $page->showcase_id = $showcase->id;
            $page->company_id = $showcase->company_id;
            $page->save();
        }

        return $page;
    }

    /**
     * @param Page $staticPage
     * @param array $data
     */
    public function updateStaticPage(Page $staticPage, array $data)
    {
        /** @var Admin $admin */
        $admin = \Auth::guard('admin')->user();

        $fields =
            [
                'company_id',
                'showcase_id',
                'name',
                'breadcrumbs',
                'meta_title',
                'meta_description',
                'meta_keywords',
            ];

        foreach ($fields as $fieldItem) {
            if (array_has($data, $fieldItem)) {
                $staticPage->$fieldItem = array_get($data, $fieldItem);
            }
        }

        $staticPage->updater_id = $admin->id;
        $staticPage->update();
    }
}
