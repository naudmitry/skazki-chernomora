<?php

namespace App\Repositories;

use App\Models\Blog;
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

    /**
     * @param Blog|null $blog
     * @param $data
     * @return Blog
     */
    public function saveBlog(Blog $blog = null, $data)
    {
        if (!isset($blog)) {
            $blog = new Blog();
        }

        $blog->title = array_get($data, 'title');
        $blog->name = array_get($data, 'name');
        $blog->meta_title = array_get($data, 'meta_title');
        $blog->meta_description = array_get($data, 'meta_description');
        $blog->meta_keywords = array_get($data, 'meta_keywords');
        $blog->save();

        if (array_get($data, 'categories')) {
            $blog->categories()->sync(array_get($data, 'categories'));
        } else {
            $blog->categories()->detach();
        }

        return $blog;
    }
}
