<?php

namespace App\Repositories;

use App\Classes\PageTypesEnum;
use App\Models\Page;

class PageRepository
{
    public function savePage(Page $page, $data)
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
            $page->save();
        }

        return $page;
    }
}
