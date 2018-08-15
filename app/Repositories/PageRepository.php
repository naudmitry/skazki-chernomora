<?php

namespace App\Repositories;

use App\Classes\PageTypesEnum;
use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Support\Facades\Auth;

class PageRepository
{
    /**
     * @param Page $page
     * @param array $data
     * @return Page
     */
    public function savePage(Page $page, array $data)
    {
        $fields =
            [
                'category_id',
                'title',
                'content',
                'meta_title',
                'meta_description',
                'meta_keywords',
            ];

        foreach ($fields as $fieldItem) {
            if (array_has($data, $fieldItem)) {
                $page->$fieldItem = array_get($data, $fieldItem);
            }
        }

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
        }

        $fields =
            [
                'title',
                'name',
                'meta_title',
                'meta_description',
                'meta_keywords',
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
     * @param $pageType
     * @return Page|\Illuminate\Database\Eloquent\Model|null|static
     */
    public function getStaticPage($pageType)
    {
        $page = Page::query()
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->where('static_page_type', $pageType)
            ->first();

        if (!isset($page)) {
            $page = new Page();
            $page->static_page_type = $pageType;
            $page->type = PageTypesEnum::STATIC_PAGE;
            $page->author_id = Auth::guard('admin')->user()->id;
            $page->updater_id = Auth::guard('admin')->user()->id;
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
        $fields =
            [
                'name',
                'meta_title',
                'meta_description',
                'meta_keywords',
            ];

        foreach ($fields as $fieldItem) {
            if (array_has($data, $fieldItem)) {
                $staticPage->$fieldItem = array_get($data, $fieldItem);
            }
        }

        $staticPage->update();
    }
}
