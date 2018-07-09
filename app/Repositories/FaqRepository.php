<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Models\FaqCategory;

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

        $category->title = array_get($data, 'title');
        $category->name = array_get($data, 'name');
        $category->meta_title = array_get($data, 'meta_title');
        $category->meta_description = array_get($data, 'meta_description');
        $category->meta_keywords = array_get($data, 'meta_keywords');
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
        if (!isset($faq)) {
            $faq = new Faq();
        }

        $faq->title = array_get($data, 'title');
        $faq->name = array_get($data, 'name');
        $faq->meta_title = array_get($data, 'meta_title');
        $faq->meta_description = array_get($data, 'meta_description');
        $faq->meta_keywords = array_get($data, 'meta_keywords');
        $faq->save();

        if (array_get($data, 'categories')) {
            $faq->categories()->sync(array_get($data, 'categories'));
        } else {
            $faq->categories()->detach();
        }

        return $faq;
    }
}
