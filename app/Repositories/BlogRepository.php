<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogRepository
{
    /**
     * @param BlogCategory|null $category
     * @param $data
     * @return BlogCategory
     */
    public function saveCategory(BlogCategory $category = null, $data)
    {
        if (!isset($category)) {
            $category = new BlogCategory();
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
     * @param Blog|null $blog
     * @param $data
     * @return Blog
     */
    public function saveBlog(Blog $blog = null, $data)
    {
        /** @var Admin $admin */
        $admin = \Auth::guard('admin')->user();

        if (!isset($blog)) {
            $blog = new Blog();
            $blog->author_id = $admin->id;
            $blog->company_id = array_get($data, 'company_id');
            $blog->showcase_id = array_get($data, 'showcase_id');
        }

        $blog->title = array_get($data, 'title');
        $blog->name = array_get($data, 'name');
        $blog->breadcrumbs = array_get($data, 'breadcrumbs');
        $blog->meta_title = array_get($data, 'meta_title');
        $blog->meta_description = array_get($data, 'meta_description');
        $blog->meta_keywords = array_get($data, 'meta_keywords');
        $blog->updater_id = $admin->id;
        $blog->save();

        if (array_get($data, 'categories')) {
            $blog->categories()->sync(array_get($data, 'categories'));
        } else {
            $blog->categories()->detach();
        }

        return $blog;
    }
}
