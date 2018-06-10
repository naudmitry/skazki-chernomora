<?php

namespace App\Repositories;

use App\Models\BlogCategory;

class BlogRepository
{
    /**
     * @param BlogCategory $category
     * @param $data
     * @return BlogCategory
     */
    public function saveCategory(BlogCategory $category = null, $data)
    {
        if (!isset($category)) {
            $category = new BlogCategory();
        }

        $category->title = array_get($data, 'title');
        $category->name = array_get($data, 'name');
        $category->meta_title = array_get($data, 'meta_title');
        $category->meta_description = array_get($data, 'meta_description');
        $category->meta_keywords = array_get($data, 'meta_keywords');
        $category->save();

        return $category;
    }
}
