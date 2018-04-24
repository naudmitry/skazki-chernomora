<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Support\Facades\Auth;

class FaqRepository
{
    /**
     * @param FaqCategory|null $category
     * @param $data
     * @return FaqCategory
     */
    public function saveCategory(FaqCategory $category = null, $data)
    {
        if (!isset($category)) {
            $category = new FaqCategory();
        }

        $fields =
            [
                'title',
                'name',
                'breadcrumbs',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'image_link',
                'color'
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
     * @param Faq|null $faq
     * @param $data
     * @return Faq
     */
    public function saveFaq(Faq $faq = null, $data)
    {
        $admin = Auth::guard('admin')->user();

        if (!isset($faq)) {
            $faq = new Faq();
            $faq->author_id = $admin->id;
        }

        $faq->title = array_get($data, 'title');
        $faq->name = array_get($data, 'name');
        $faq->content = array_get($data, 'answer');
        $faq->breadcrumbs = array_get($data, 'breadcrumbs');
        $faq->meta_title = array_get($data, 'meta_title');
        $faq->meta_description = array_get($data, 'meta_description');
        $faq->meta_keywords = array_get($data, 'meta_keywords');
        $faq->updater_id = $admin->id;
        $faq->save();

        if (array_get($data, 'categories')) {
            $faq->categories()->sync(array_get($data, 'categories'));
        } else {
            $faq->categories()->detach();
        }

        return $faq;
    }
}
